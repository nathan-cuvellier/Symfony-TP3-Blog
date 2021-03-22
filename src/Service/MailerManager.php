<?php


namespace App\Service;


use App\Entity\User;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;

class MailerManager
{

    public function __construct(private EmailVerifier $emailVerifier){}

    public function confirmRegistration(User $user) {
        $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
            (new TemplatedEmail())
                ->from(new Address('contact@nathan-cuvellier.fr', 'test'))
                ->to($user->getEmail())
                ->subject('Please Confirm your Email')
                ->htmlTemplate('security/confirmation_email.html.twig')
        );
    }

}