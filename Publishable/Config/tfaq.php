<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Musoni Website Views
     |--------------------------------------------------------------------------
     | The website has pre-defined view, their customization can be handled here
     |
     |
     */
    'namespace'=>'\\Tyondo\\Faq\\Models\\',
    'views' => [
        'layouts' => [
            'master'        => 'TyondoFaq::layouts.admin',
        ],
        'partials' => [
            'menu' => 'TyondoFaq::partials.front-end.main-menu',
            'footer' => 'TyondoFaq::partials.front-end.main-footer',
            'top' => 'TyondoFaq::partials.front-end.top-bar',
            '2action' => 'TyondoFaq::partials.front-end.call-out',
            'news' => [
                'index' => 'TyondoFaq::partials.front-end.news.index',
                'loop' => 'TyondoFaq::partials.front-end.news.news-loop',
            ],
            'products' => [
                'sidebar' => 'TyondoFaq::partials.front-end.products.sidebar',
            ]
        ],
        'back-end' => [
            'team' => [
                'index'     => 'TyondoFaq::back-end.team.index',
                'create'    => 'TyondoFaq::back-end.team.create',
                'show'      => 'TyondoFaq::back-end.team.show',
                'edit'      => 'TyondoFaq::back-end.team.edit',
                'role'      => 'TyondoFaq::back-end.team.role',
            ],
            'faq' => [
                'index'     => 'TyondoFaq::back-end.faq.index',
                'create'    => 'TyondoFaq::back-end.faq.create',
                'show'      => 'TyondoFaq::back-end.faq.show',
                'edit'      => 'TyondoFaq::back-end.faq.edit',
                'role'      => 'TyondoFaq::back-end.faq.role',
            ],
            'products' => [
                'index'     => 'TyondoFaq::back-end.products.index',
                'create'    => 'TyondoFaq::back-end.products.create',
                'show'      => 'TyondoFaq::back-end.products.show',
                'edit'      => 'TyondoFaq::back-end.products.edit',
                'role'      => 'TyondoFaq::back-end.products.role',
            ],
            'testimonials' => [
                'index'     => 'TyondoFaq::back-end.testimonials.index',
                'create'    => 'TyondoFaq::back-end.testimonials.create',
                'show'      => 'TyondoFaq::back-end.testimonials.show',
                'edit'      => 'TyondoFaq::back-end.testimonials.edit',
                'role'      => 'TyondoFaq::back-end.testimonials.role',
            ],
        ],
        'front-end' => [
            'about' =>  [
                'faq' => 'TyondoFaq::front-end.about.about-faq',
                'team' => 'TyondoFaq::front-end.about.about-team',
                'testimonials' => 'TyondoFaq::front-end.about.about-testimonials',
                'about' => 'TyondoFaq::front-end.about.about-us',
                'index' => 'TyondoFaq::front-end.about.index'
            ],
            'contact'   =>  [
                'contact' => 'TyondoFaq::front-end.contact.contact-us',
                'account' => 'TyondoFaq::front-end.contact.',
            ],
            'home'  =>  [
                'index' =>  'TyondoFaq::front-end.home.index'
            ],
            'loan'  =>  [
                'form'   =>  'TyondoFaq::front-end.loan.form'
            ],
            'news'  =>  [
                'list' =>  'TyondoFaq::front-end.news.news-grid'
            ],
            'products'  =>  [
                'products' => 'TyondoFaq::front-end.products.products',
                'agriBusiness' => 'TyondoFaq::front-end.products.agri-business-loans',
                'assetFinance' => 'TyondoFaq::front-end.products.asset-finance-loans',
                'education' => 'TyondoFaq::front-end.products.education-loans',
                'emergency' => 'TyondoFaq::front-end.products.emergency-loans',
                'groupBusiness' => 'TyondoFaq::front-end.products.group-business-loans',
                'individualBusiness' => 'TyondoFaq::front-end.products.individual-business-loans',
            ],
            'projects'
        ],


        'shared'=>[
            'google-analytics' => 'mnara::admin.shared.GoogleAnalytics'
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Musoni Package Navigation Menu
    |--------------------------------------------------------------------------
    |
    |
    */
    'navigation' => [

        [
            'group' => 'Team',
            'class' => 'fa fa-book fa-lg',
            'links' => [
                [
                    'title' => 'Add Team',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'musoni.team.create'
                ],
                [
                    'title' => 'Manage Team',
                    'class' => 'fa fa-newspaper-o',
                    'route' => 'musoni.team.index'
                ],
                [
                    'title' => 'List Team',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'musoni.team.index'
                ],
            ]
        ],

        [
            'group' => 'FAQ',
            'class' => 'fa fa-cubes fa-lg',
            'links' => [
                [
                    'title' => 'Add Faq',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'musoni.faq.create'
                ],
                [
                    'title' => 'List Faq',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'musoni.faq.index'
                ],

            ]
        ],

        [
            'group' => 'Testimonials',
            'class' => 'fa fa-cubes fa-lg',
            'links' => [
                [
                    'title' => 'Add Category',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'musoni.testimonial.create'
                ],
                [
                    'title' => 'List Category',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'musoni.testimonial.index'
                ],

            ]
        ],
        [
            'group' => 'Products',
            'class' => 'fa fa-cubes fa-lg',
            'links' => [
                [
                    'title' => 'Add Product',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'musoni.product.create'
                ],
                [
                    'title' => 'List Products',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'musoni.product.index.list'
                ],

            ]

        ],
    ],
];