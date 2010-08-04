vjCommentPlugin
=================

This plugin provides possibility to add commentable functionality to your models, 
which will allow users to place comments.

A presentation of the plugin is available [here](http://www.ville-villejuif.fr/symfony/vjCommentPlugin/).

Installation
------------

  * Install the plugin

    $ symfony plugin:install vjCommentPlugin
    $ symfony plugin:publish-assets
    $ symfony cc

  * If you do migrations, run them now:

    ./symfony doctrine:generate-migrations-diff
    ./symfony doctrine:migrate

How to make something commentable?
-------------

Add behavior in your schema:

  * edit config/doctrine/schema.yml

        YourModel:
          actAs:
            Commentable:
            # others behaviors

Build your project:

  * If it's a new project (you don't have build all, so do it !)

        $ symfony doctrine:build --all

  * If it's an old project, you're adding Commentable ability to:

        $ symfony doctrine:build --model --forms --filters --sql

At this point behaviour doesn't change or add anything to the model, so migrations will do nothing.

Activate module in frontend

  * edit apps/your_frontend_app/config/settings.yml

        enabled_modules:        [..., comment]

Add the form and/or the list of comments wherever you want

  * edit your action file

        public function executeIndex(sfWebRequest $request)
        {
          $this->news = Doctrine::getTable('News')->find($request->getParameter('id'));
        }

  * edit your template file

        <?php include_component('comment', 'formComment', array('object' => $yourModelsObject)) ?>
        <?php include_component('comment', 'list', array('object' => $yourModelsObject, 'i' => 0)) ?>

And ... that's all !
You only need to get your object and to pass it to the template and two components do the rest.

Logged users and comments
-------------

Since 1.1.0 we've added setting, that would allow you to connect sfGuardUser with comments:

  * edit apps/your_frontend_app/config/app.yml

        all:
          vjCommentPlugin:
            guardbind: false
            restricted: false

First setting adds relation between Comment and sfGuardUser model.
After setting it to true, make sure to run:

    ./symfony doctrine:generate-migrations-diff
    ./symfony doctrine:migrate

Second setting if set to true restricts comments only to logged in user.

How to enable reCaptcha
-------------

You need to enable it in each frontend application

  * edit apps/your_frontend_app/config/app.yml

        all:
          recaptcha:
            enabled:        true
            # visit http://recaptcha.net/
            public_key:     your_public_recaptcha_key
            private_key:    your_private_recaptcha_key


How to disable or param Gravatar
-------------

Gravatar is enabled by default, to disable it

  * edit apps/your_frontend_app/config/app.yml

        all:
          gravatar:
            enabled:        false

You can change default size, image or directories of gravatar

  * edit apps/your_frontend_app/config/app.yml

        all:
          gravatar:
            default_size:   40
            default_image:  ../web/images/gravatar_default.png
            upload_dir:     .. # by default, this uses sf_upload_dir configuration
            cache_dir_name: g_cache

How to moderate comments and/or reports ?
-------------

Activate modules in backend

  * edit apps/your_backend_app/config/settings.yml

        enabled_modules:        [..., commentAdmin, commentReportAdmin]

**Moderate comments**
You can edit a comment, reply to or delete one. Deletion is not permanent ; the comment appears in frontend with the mention 'deleted by moderator'.
You can restore it.
Reply in backend is same as reply in frontend. You can use the user object to override author values in the form.

**Moderate reports**
You can remove, validate or invalidate a report and edit or remove a comment.
There's three states : untreated, validated and invalidated. By default, list only shows untreated reports. You can switch in filters.

In the list of the commentAdmin module, comment's body is truncated to 50 characters by default to keep a readable list.
You can edit this option :

  * edit apps/your_frontend_app/config/app.yml

        all:
          commentAdmin:
            max_length:     50

Internationalization
-------------

English (default), French, Polish (thanks to [fizyk](http://www.symfony-project.org/plugins/developer/grzegorz-liwiski)) and Italian (thanks to Alessandro Rossi) translations are embed in the plugin.

To use french :

  * edit apps/your_apps/config/settings.yml

        default_culture:        fr #en
        i18n:                   true

  * edit apps/your_apps/config/app.yml

        all:
          culture_locale:  fr_FR.utf8

  * edit apps/your_apps/config/factories.yml

        all:
          user:
            class: myUser

  * edit apps/your_apps/lib/myUser.class.php

        class myUser extends sfBasicSecurityUser
        {
          public function setCulture($culture)
          {
            setlocale(LC_TIME, sfConfig::get('app_culture_locale'));
            parent::setCulture($culture);
          }
        }

  * copy the generator.yml files

        $ cp -r plugins/vjCommentPlugin/more/modules/fr/commentAdmin/ apps/your_backend_app/modules/
        $ cp -r plugins/vjCommentPlugin/more/modules/fr/commentReportAdmin/ apps/your_backend_app/modules/
        $ symfony cc

  * don't forget to delete your cookies !


TODO
-------------

* Integrate the tests provided


Thanks
-------------
A really thanks to [fizyk](http://www.symfony-project.org/plugins/developer/grzegorz-liwiski) for all his comments,
the polish translation and especially for all his great ideas ! And now, for being developper of this plugin !

Thanks also to Alessandro Rossi for the Italian translation !


Contact
-------------
Please contact me if you see a problem, an error or if you think that something can be enhanced !
Advice are cool too !