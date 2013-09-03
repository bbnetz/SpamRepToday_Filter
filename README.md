SpamRepToday_Filter
===================

You need to take care if your server is sending spam? Try out [SpamRep_Today](http://www.postconf.com/docs/spamrep/spamrep_today)!

And now you get mails every day with informations. Even if you are not interested in `no founds` or one spam mail. This lowers your interest in reading those mails because you get them every day. It is nothing important at all.

This little filter is ignoring uninteresting mails and sends it to /dev/null. Only important mails will fill your inbox from now on!

What it does
------------

As SpamRep_Today is reading all your log file and sending you emails via cron mail to inform you each day if spam is found and how much spam is found this small php script is filtering for two important things:

* Takes a look if output contains e.g. `Nothing found`
* Set your minimal spam per day in filter.php and ignore this way the unimportant amount of spam mails per day

This reduces the spam you get from your cron daemon a lot, so that you only get mails if you realy have a problem =). Every server is sending a single spam mail from time to time because of bots using your forms...

How to use
---------

Just pipe your spamrep_today output into `filter.php`. This could look like this for a cron:

    30 5 * * * root /path/spamrep_today | /path/SpamRepToday_filter/filter.php

How to contribute
-----------------
The TYPO3 Community lives from your contribution!

You wrote a feature? - Start a pull request!

You found a bug? - Write an issue report!

You are in the need of a feature? - Write a feature request!

You have a problem with the usage? - Ask!
