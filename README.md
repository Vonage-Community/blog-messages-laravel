# Laravel Messages

![](VonagePOE_Primary.png)

Laravel Messages is a very simple demo app to show a Messages API integration with Laravel 10. It receives and responds to WhatsApp messages, sends Messages to a whitelisted number, and logs the incoming status events.

## Welcome to Vonage

If you're new to Vonage, you can [sign up for an account](https://dashboard.nexmo.com/sign-up) and get some free credit to get you started.

## Set Up the Project

We've tried to keep things short and sweet!

* Clone this repo and run `composer install` (requires PHP 8.1+).
* Copy `.env.example` to `.env`, add your credentials to the `VONAGE_*` fields at the bottom.
* Run your application with `php artisan serve`.
* If you're working locally, run [ngrok](https://ngrok.com) to expose the port locally; copy the URL.
* On the [Dashboard](https://dashboard.nexmo.com), go to the Messages API Sandbox, and whitelist your phone for WhatsApp.
* On the same page, configure the webhook URLs for incoming messages and status events:
    - incoming messages should be `[url you copied earlier]/webhooks/inbound`
    - status webhooks should go to `[url you copied earlier]/webhooks/status`

You're all set!

## Run the Project

Visit `[url of project]/messages` and enter the number of the whitelisted phone (in E163 format, e.g. 447770007777. You should get a WhatsApp message.

## Getting Help

We love to hear from you so if you have questions, comments or find a bug in the project, let us know! You can either:

* Open an issue on this repository.
* Before you start contributing, check out the [Code of Conduct](CODE_OF_CONDUCT).
* Tweet at us! We're [@VonageDev on Twitter](https://twitter.com/VonageDev)
* Or [join the Vonage Community Slack](https://developer.vonage.com/en/community/slack)

## Further Reading

* Check out the Developer Documentation at <https://developer.nexmo.com>
