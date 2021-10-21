<?php

    use App\Models\TimeSlot;
    use App\Models\UserSubscriptionVisit;
    use Carbon\Carbon;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Request;

    /**
     * @throws Exception
     */
    function getAge($birthdayDate): int
    {
        $date=new DateTime($birthdayDate);
        $now=new DateTime();
        $interval=$now->diff($date);
        return $interval->y;
    }

    /**
     * @param $date
     *
     * @return string
     */
    function convertToDateTimeLocal($date): string
    {
        return (!empty($date) && $date != '0000-00-00 00:00:00') ? date("Y-m-d", strtotime($date)) . 'T' . date("H:i:s", strtotime($date)) : '';
    }

    /**
     * @param $val
     *
     * @return bool
     */
    function PerUser($val): bool
    {
        $UserPermissionsData=Request::get('UserPermissionsData');
        return isset($UserPermissionsData->$val) && $UserPermissionsData->$val;
    }

    /**
     * @param $time
     *
     * @return string|void
     */
    function timeAgo($time)
    {
        $time=strtotime($time);
        $time=time() - $time; // to get the time since that moment
        $time=($time < 1) ? 1 : $time;
        $tokens=[
            31536000=>'year',
            2592000=>'month',
            604800=>'week',
            86400=>'day',
            3600=>'hour',
            60=>'minute',
            1=>'second',
        ];
        foreach ($tokens as $unit=>$text) {
            if ($time < $unit) {
                continue;
            }
            $numberOfUnits=floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
    }

    /**
     * @param $post
     * @param $name
     *
     * @return mixed
     */
    function makeDefaultImage($post, $name)
    {
        if (!(!empty($post->img_dir) && !empty($post->img) && file_exists(public_path($post->img_dir . $post->img)))) {
            $post->img_dir='/img/' . $name . '/';
            $post->img='default_image.png';
        }
        return $post;
    }

    /**
     * @param        $file
     * @param        $folder_name
     * @param string $input_name
     *
     * @return string
     */
    function FileImage($file, $folder_name, string $input_name='image'): string
    {
        $path='/' . $folder_name . '/';
        if (!file_exists(public_path() . $path)) {
            File::makeDirectory(public_path() . $path, $mode=0777, TRUE, TRUE);
        }
        //    if (!file_exists(public_path() . $path.'thumbnail')) {
        //        File::makeDirectory(public_path() . $path.'thumbnail', $mode = 0777, true, true);
        //    }
        //file new name
        $nameFile=str_replace('/', '_', $folder_name) . '_' . rand(0000, 9999) . '_' . time();
        //file extension
        $ext=$file->getClientOriginalExtension();
        //file old name
        //    $old_name = $file->getClientOriginalName();
        //convert the size of the file
        //$size = ImageUploader::GetSize($file->getSize());
        //get the mime type of the file
        //    $mimtype = $file->getMimeType();
        //making the new name with extension
        $masterName=$nameFile . '.' . $ext;
        //    list($width, $height, $type, $attr) = getimagesize($_FILES[$input_name]['tmp_name']);
        //    $width_per=round(($width*10)/100);
        //    $height_per=round(($height*10)/100);
        $file->move(public_path() . $path, $masterName);
        //    Image::make(public_path() . $path  . $mastername, array(
        //        'width' => $width_per,
        //        'height' => $height_per,
        //    ))->save(public_path() . $path . 'thumbnail/thumbnail_' . $mastername);
        return $path.$masterName;
    }

    /**
     * @param        $file
     * @param        $folder_name
     * @param string $input_name
     *
     * @return string[]
     */
    function file64Uploader($file, $folder_name, string $input_name='image'): array
    {
        $folder='/' . $folder_name . '/';
        if (!file_exists(public_path() . $folder)) {
            File::makeDirectory(public_path() . $folder, $mode=0777, TRUE, TRUE);
        }
        //file new name
        $image              = $file;  // your base64 encoded
        $extension          = explode('/', explode(':',
            substr($image, 0,
                strpos($image, ';')
            )
        )[1])[1];   // .jpg .png .pdf
        //        $image              = str_replace('data:image/' . $extension . ';base64,', '', $image);
        //        $image              = str_replace(' ', '+', $image);
        $image=explode(';base64,',$image)[1];
        $filename           = $folder_name . '_' . rand(0000, 9999) . '_' . time() .'.'. $extension;
        //        $filePath           = $folder . $filename;
        //        $disk               = Storage::disk('public')->put(, );
        file_put_contents(public_path($folder. $filename), base64_decode($image));

        return ['img'=>$filename, 'img_dir'=>$folder];
    }

    /**
     * @param        $file
     * @param        $folder_name
     * @param        $x
     * @param string $input_name
     *
     * @return string[]
     */
    function FileImages($file, $folder_name, $x, string $input_name='images'): array
    {
        $path='/img/' . $folder_name . '/' . date('Y/m/d') . '/';
        if (!file_exists(public_path() . $path)) {
            File::makeDirectory(public_path() . $path, $mode=0777, TRUE, TRUE);
        }
        if (!file_exists(public_path() . $path . 'thumbnail')) {
            File::makeDirectory(public_path() . $path . 'thumbnail', $mode=0777, TRUE, TRUE);
        }
        //file new name
        $namefile=$folder_name . '_' . rand(0000, 9999) . '_' . time();
        //file extension
        $ext=$file->getClientOriginalExtension();
        //file old name
        $old_name=$file->getClientOriginalName();
        //convert the size of the file
        //$size = ImageUploader::GetSize($file->getSize());
        //get the mime type of the file
        $mimtype=$file->getMimeType();
        //making the new name with extension
        $mastername=$namefile . '.' . $ext;
        [$width, $height, $type, $attr]=getimagesize($_FILES[$input_name]['tmp_name'][$x]);
        $width_per=round(($width * 10) / 100);
        $height_per=round(($height * 10) / 100);
        $file->move(public_path() . $path, $mastername);
        switch ($folder_name) {
            case 'flights':
            case'hotels':
                $imagesResize=[
                    0=>['width'=>60, 'height'=>60],
                    1=>['width'=>260, 'height'=>180],
                    2=>['width'=>400, 'height'=>200],
                ];
                break;
            default:
                $imagesResize=[];
                break;
        }
        foreach ($imagesResize as $imageSize) {
            $widthS=$imageSize['width'];
            $heightS=$imageSize['height'];
            Image::make(public_path() . $path . $mastername, [
                'width'=>$widthS,
                'height'=>$heightS,
            ])->save(public_path() . $path . 'thumbnail/' . $widthS . '_' . $heightS . '_' . $mastername);
        }
        Image::make(public_path() . $path . $mastername, [
            'width'=>$width_per,
            'height'=>$height_per,
        ])->save(public_path() . $path . 'thumbnail/thumbnail_' . $mastername);
        return ['img'=>$mastername, 'img_dir'=>$path];
    }

    /**
     * @return array
     */
    function getDaysName(): array
    {
        $timestamp=strtotime('next Sunday');
        $days=[];
        for ($i=0; $i < 7; $i++) {
            $days[]=strtolower(strftime('%A', $timestamp));
            $timestamp=strtotime('+1 day', $timestamp);
        }
        return $days;
    }

    /**
     * @param        $html
     * @param        $email
     * @param        $name
     * @param        $subject
     * @param array  $attachments
     * @param string $replayTo
     *
     * @return array
     */
    function sendGridEmailToUser($html, $email, $name, $subject, array $attachments=[], string $replayTo='info@e3-business.com'): array
    {
        try {
            $sendEmail=new Mail();
            $sendEmail->setFrom('info@e3-business.com', 'E3 Business');
            $sendEmail->setReplyTo($replayTo, 'E3 Business');
            $sendEmail->setSubject($subject);
            $sendEmail->addTo($email, $name);
            $sendEmail->addContent("text/html", $html);
            foreach ($attachments as $attachment) {
                $file_encoded=base64_encode(file_get_contents(public_path($attachment->file_dir . $attachment->file)));
                $type=mime_content_type(public_path($attachment->file_dir . $attachment->file));
                $sendEmail->addAttachment(
                    $file_encoded,
                    $type,
                    $attachment->file,
                    "attachment"
                );
            }
            $sendgrid=new SendGrid('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');
            $sent=$sendgrid->send($sendEmail);
        } catch (TypeException $e) {
            return ['message'=>$e->getMessage(), 'success'=>FALSE];
        }
        return ['message'=>'success', 'success'=>TRUE, '$sent'=>$sent];
    }

    /**
     * @param $type
     * @param $type_id
     * @param $rating
     * @param $student_id
     */
    function addRating($type, $type_id, $rating, $student_id)
    {
        $newRating=Rating::where('type', $type)->where('type_id', $type_id)->where('student_id', $student_id)->first();
        if (!$newRating) {
            $newRating=new Rating();
            $newRating->type=$type;
            $newRating->type_id=$type_id;
            $newRating->student_id=$student_id;
        }
        $newRating->rating=$rating;
        $newRating->save();
        $ratingCount=Rating::where('type', $type)->where('type_id', $type_id)->count();
        $ratingSum=Rating::where('type', $type)->where('type_id', $type_id)->sum('rating');
        DB::table($type)->where('id', $type_id)->update(['rating'=>round($ratingSum / $ratingCount), 'rating_count'=>$ratingCount]);
    }

    /**
     * @param $type
     * @param $type_id
     * @param $rating
     * @param $student_id
     * @param $course_rating_outline_percentage
     * @param $course_rating_documents_percentage
     * @param $course_rating_instructor_percentage
     * @param $course_rating_media_percentage
     *
     * @return mixed
     */
    function addRatingLog($type, $type_id, $rating, $student_id, $course_rating_outline_percentage, $course_rating_documents_percentage, $course_rating_instructor_percentage, $course_rating_media_percentage)
    {
        return RatingLogs::create([
            'type'=>$type,
            'rating'=>$rating,
            'type_id'=>$type_id,
            'student_id'=>$student_id,
            'course_rating_outline_percentage'=>$course_rating_outline_percentage,
            'course_rating_documents_percentage'=>$course_rating_documents_percentage,
            'course_rating_instructor_percentage'=>$course_rating_instructor_percentage,
            'course_rating_media_percentage'=>$course_rating_media_percentage,
        ]);
    }

    /**
     * @param $type
     * @param $type_id
     * @param $student_id
     *
     * @return bool
     */
    function hasRating($type, $type_id, $student_id): bool
    {
        return Rating::where('type', $type)->where('type_id', $type_id)->where('student_id', $student_id)->count() ? TRUE : FALSE;
    }


    /**
     * @param string $social_type
     *
     * @return null
     */
    function getSocialLink(string $social_type='facebook')
    {
        $social=SocialsLinks::where('social_type', $social_type)->active()->market()->first();
        if ($social) {
            return $social;
        }
        return NULL;
    }

    /**
     * @param $query
     *
     * @return string
     */
    function getEloquentSqlWithBindings($query): string
    {
        return vsprintf(str_replace('?', '%s', $query->toSql()), $query->getBindings()->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }

    /**
     * @param string $key
     *
     * @return null
     */
    function getAppSetting(string $key='')
    {
        $appSetting=AppSettings::select('value')->where('key', $key)->first();
        if ($appSetting) {
            return $appSetting->value;
        }
        return NULL;
    }

    /**
     * @param $str
     *
     * @return string
     */
    function generateSerialNumber(string $str): string
    {
        return 'MISMAR-NO-' . strtoupper($str);
    }

    /**
     * @param        $id
     * @param string $key
     * @param false  $language
     *
     * @return null
     */
    function getStaticPageValue($id, string $key='title', $language=FALSE)
    {
        $language_id=Request::get('DEFAULT_LANGUAGE_ID');
        $value=Request::get('STATIC_PAGE_' . $id . '_' . $key);
        if ($value) {
            return $value;
        }
        $staticPage=StaticPage::where(function ($q) use ($id) {
            $q->where('id', $id)->orWhere('url', $id)->orWhere('route_name', $id);
        });
        if ($language) {
            $staticPage=$staticPage->where('language_id', $language_id);
        }
        $staticPage=$staticPage->first();
        if ($staticPage) {
            $request=Request();
            $request->attributes->add(['STATIC_PAGE_' . $id . '_' . $key=>$staticPage->$key]);
            return $staticPage->$key;
        }
        return NULL;
    }

    /**
     * @param        $table_id
     * @param        $type
     * @param string $table
     *
     * @return mixed
     */
    function hasLikeDislike($table_id, $type, string $table='live_streams')
    {
        return LikesDislikes::where('table_id', $table_id)->where('table', $table)->where('type', $type)->count();
    }

    function replacingAllData($html, $paramsReplace)
    {
        foreach ($paramsReplace as $key=>$value) {
            $html=str_replace('{' . $key . '}', $value, $html);
        }
        return $html;
    }

    function sentEmailTemplate($templateKey, $email, $name, $paramsReplace=[], $attachments=[])
    {
        $template=EmailsTemplates::where('key', $templateKey)->first();
        if ($template) {
            $html=replacingAllData($template->content, $paramsReplace);
            $subject=replacingAllData($template->subject, $paramsReplace);
            sendGridEmailToUser($html, $email, $name, $subject, $attachments);
        }
    }

    function saveEmailLog($key, $student_id, $type, $market)
    {
        $emailLog=new EmailLog();
        $emailLog->key=$key;
        $emailLog->market_id=$market;
        $emailLog->student_id=$student_id;
        $emailLog->status=1;
        $emailLog->sent_at=Carbon::now();
        $emailLog->subscription_type=$type;
        $emailLog->save();
    }

    function sendNotificationToAdmin($market, $group, $type, $student)
    {
        $client=new Client();
        $url=env('DASHBOARD_URL') . '/api/send-notification';
        $request=$client->get($url, ['query'=>[
            'market'=>$market,
            'group'=>$group,
            'type'=>$type,
            'notification_id'=>$student,
        ]]);
        return $request->getBody();
    }

    function timeToDecimal($time)
    {
        $decTime=0;
        if (preg_match("/^([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $time, $matches)) {
            $decTime=($matches[1] * 60) + ($matches[2]) + ($matches[3] / 60);
        }
        return $decTime;
    }

    function toSlug($string)
    {
        return str_replace(' ', '-', strtolower($string));
    }

    function userHasSubscription($subscription_id): int
    {
        $user_has_subscription=\App\Models\User::find(auth()->id())->getSubscriptionData($subscription_id);
        if ($user_has_subscription) {
            return userHasUnExpiredSubscription($user_has_subscription->pivot->end_at);
        }
        else {
            return -1;
        }
    }

    function userHasUnExpiredSubscription($end_at): int
    {
        return Carbon::make($end_at)->diffInDays(Carbon::now());
    }

    function createAvailableVisitDate($days, $start_period = null): string
    {
        $start_period = $start_period == null ? Carbon::now()->toDateString() : $start_period;
        $end_period = Carbon::now()->addDays($days)->toDateString();
        return getTimeSlot($start_period, $end_period, $days);
    }

    function getTimeSlot($start_period, $end_period, $days)
    {
        $time_slots = TimeSlot::whereRaw("day BETWEEN '$start_period' AND '$end_period'")->inRandomOrder();
        if ($time_slots->count() > 0)
        {
            foreach ($time_slots->get() as $time_slot) {
                if ($time_slot->status == 1) {
                    $time_slot->status=-1;
                    $time_slot->update();
                    return $time_slot->id;
                }
            }
        }
        return createTimeSlot($days/2);
    }

    function createTimeSlot($day)
    {
        $time_slot = new TimeSlot();
        $time_slot->day = Carbon::now()->addDays($day)->toDateString();
        $time_slot->status = -1;
        $time_slot->from = '10:00:00';
        $time_slot->to = '11:00:00';
        $time_slot->save();
        return $time_slot->id;
    }
