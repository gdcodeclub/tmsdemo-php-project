# TMS Demo - Project

## Install Composer Globally

First, CD to your home dir.

> cd ~

Run the commands at the top of this page: https://getcomposer.org/download/

Move composer.phar to be a global command. (might need to sudo)

> mv composer.phar /usr/local/bin/composer

## Clone this Project

(This assumes you cloned the Vagrant project first. https://github.com/gdcodeclub/tmsdemo-php-vagrant)

CD to your workspace.

> cd /path/to/your/workspace

Clone this project into a folder NEXT TO the TMS Demo Vagrant project. Keeping the default folder name.

> git clone https://github.com/gdcodeclub/tmsdemo-php-project.git

CD to this project root.

> cd tmsdemo-php-project/

Run `composer install`.

> composer install

Copy the .env.example file to .env, and fill in your own TMS_KEY and TMS_ENDPOINT url

Refresh `tmsdemo.dev`.

## Feature Roadmap for this TMS Client

* capture messageID to db
* sent message info page display by messageID
* send to multiple recipients
* send to sms
* send to multiple sms recipients
