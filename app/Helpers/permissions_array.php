<?php
/* if change this please enter the parent in the top of permissions_settings array and the children under it for given the right style */
$GLOBALS['permissions_settings']=array(
    /*parent*/
    'users',
    /*start Sup*/
    'users_add',
    'users_view',
    'users_edit',
    'users_delete',
    'users_active',
    /*End Sup*/

    'system_users',
    'system_users_add',
    'system_users_view',
    'system_users_edit',
    'system_users_delete',
    'view_information',

    'profiles',
    'profiles_add',
    'profiles_edit',
    'profiles_delete',
    'profiles_active',
    'profiles_view',

    'blogs',
    'blogs_add',
    'blogs_edit',
    'blogs_delete',
    'blogs_view',
    'blogs_active',

    'videos',
    'videos_add',
    'videos_edit',
    'videos_delete',
    'videos_view',
    'videos_active',



    'static_pages',
    'static_pages_add',
    'static_pages_edit',
    'static_pages_delete',
    'static_pages_view',
    'static_pages_active',

    'payment_methods',
    'payment_methods_add',
    'payment_methods_edit',
    'payment_methods_delete',
    'payment_methods_view',
    'payment_methods_active',

    'therapists',
    'therapists_add',
    'therapists_edit',
    'therapists_delete',
    'therapists_view',
    'therapists_active',
    'therapists_download_resume',
    'therapists_download_licence',
    'therapists_download_certificate',

    'visitors',
    'visitors_add',
    'visitors_edit',
    'visitors_delete',
    'visitors_view',


    'evaluations',
    'evaluations_delete',
    'evaluations_view',
    'evaluations_show',


    'certificates',
    'certificates_add',
    'certificates_edit',
    'certificates_delete',
    'certificates_view',

    'sessions',
    'sessions_add',
    'sessions_edit',
    'sessions_delete',
    'sessions_view',

    'properties',
    'properties_add',
    'properties_edit',
    'properties_delete',
    'properties_view',
    'properties_active',

    'services',
    'services_add',
    'services_edit',
    'services_delete',
    'services_view',
    'services_active',

    'sliders',
    'sliders_add',
    'sliders_edit',
    'sliders_delete',
    'sliders_view',
    'sliders_active',

    'partners',
    'partners_add',
    'partners_edit',
    'partners_delete',
    'partners_view',
    'partners_active',

    'languages',
    'languages_add',
    'languages_edit',
    'languages_delete',
    'languages_view',
    'languages_active',

    'countries',
    'countries_add',
    'countries_edit',
    'countries_delete',
    'countries_view',

    'specialties',
    'specialties_add',
    'specialties_edit',
    'specialties_delete',
    'specialties_view',

    //wesite-comments
    'comments',
    'comment_delete',
    'comment_active',
    'comment_view',

    //recommendation-questions-answers
    'answers',
    'answer_delete',
    'answer_view',

    //faqs-questions-answers
    'faqs',
    'faqs_add',
    'faqs_edit',
    'faqs_delete',
    'faqs_view',

    //complaints
    'complaints',
    'complaint_delete',
    'complaint_view',

    //contacts
    'contacts',
    'contact_delete',
    'contact_view',

    'settings',
    'system',

    'profile',
    'dashboard',






);
$GLOBALS['sup_permissions']=array(
    'users'=>array('users_add','users_view','users_edit','users_delete','users_active'),
    'system_users'=>array('system_users_add','system_users_view','system_users_edit','system_users_delete','view_information'),
    'profiles'=>array('profiles_add','profiles_edit','profiles_delete','profiles_active','profiles_view'),
    'blogs'=>array('blogs_add','blogs_edit','blogs_delete','blogs_view','blogs_active'),
    'videos'=>array('videos_add','videos_edit','videos_delete','videos_view','videos_active'),
    'static_pages'=>array('static_pages_add','static_pages_edit','static_pages_delete','static_pages_view','static_pages_active'),
    'payment_methods'=>array('payment_methods_add','payment_methods_edit','payment_methods_delete','payment_methods_view','payment_methods_active'),
    'therapists'=>array('therapists_add','therapists_edit','therapists_delete','therapists_view','therapists_active','therapists_download_resume','therapists_download_licence','therapists_download_certificate'),
    'certificates'=>array('certificates_add','certificates_edit','certificates_delete','certificates_view'),
    'sessions'=>array('sessions_add','sessions_edit','sessions_delete','sessions_view'),
    'services'=>array('services_add','services_edit','services_delete','services_view','services_active'),
    'properties'=>array('properties_add','properties_edit','properties_delete','properties_view','properties_active'),
    'sliders'=>array('sliders_add','sliders_edit','sliders_delete','sliders_view','sliders_active'),
    'partners'=>array('partners_add','partners_edit','partners_delete','partners_view','partners_active'),
    'languages'=>array('languages_add','languages_edit','languages_delete','languages_view','languages_active'),
    'countries'=>array('countries_add','countries_edit','countries_delete','countries_view'),
    'specialties'=>array('specialties_add','specialties_edit','specialties_delete','specialties_view'),
    'comments'=>array('comment_view','comment_delete','comment_active'),
    'answers'=>array('answer_delete','answer_view'),
    'evaluations'=>array('evaluations_delete','evaluations_view','evaluations_show'), //therapist Evaluation
    'complaints'=>array('complaint_delete','complaint_view'), //complaint Evaluation
    'contacts'=>array('contact_delete','contact_view'), //contact Evaluation
    'faqs'=>array('faqs_add','faqs_edit','faqs_delete','faqs_view'), //faqs-questions-answers
    'settings'=>array('system'),
    'visitors'=>array('visitors_add','visitors_edit','visitors_delete','visitors_view'),
);
