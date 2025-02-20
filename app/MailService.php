<?php
namespace App;
use App\Mail\BlogPosted;
use App\Models\User;
use App\Models\Blog;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\EmailParams;
class MailService {

    private $mailParams = [];

    private static function get_mailable_users()
    {
        return User::all();
    }

    public static function SendBulkEmail()
    {
        $mailersend = new MailerSend(['api_key' => env("MAILERSEND_API_KEY")]);
        $users = MailService::get_mailable_users();

        $recipients = [];
        $i = 0;
        foreach($users as $user)
        {
            $recipients[$i] = new Recipient($user->email, $user->username);
            $i++;
        }

        $bulkEmailParams = [];
        $bulkEmailParams[] = (new EmailParams())
            ->setRecipients($recipients)
            ->setSubject("blog")
            ->setFrom("amir.basirat.2004@gmail.com")
            ->setFromName(env("MAIL_FROM_NAME", "Amaweb"))
            ->setHtml("mail.blog-posted");

        $mailersend->bulkEmail->send($bulkEmailParams);
    }
}
