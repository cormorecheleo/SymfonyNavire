<?php


class GestionContact {
    // documentation : https://swiftmailer.symfony.com/docs/sending.html
    private \Swift_Mailer $mail;
    private Environment $environnementTwig;
    private ManageRegistry $doctrine;
    private MessageRepository $repo;


    function __construct(\Swift_Mailer $mail, Environment $environnementTwig, ManageRegistry $doctrine, MessageRepository $repo){
        $this->mail = $mail;
        $this->environnementTwig = $environnementTwig;
        $this->doctrine = $doctrine;
        $this->repo=$repo;
    }

    public function envoiMailContact(Message $message){
        //$titre = ($contact->getTitre() == 'M') ? ('Monsieur') : ('Madame');
        $email = (new \Swift_Message('Demande de renseignement'))
            ->setForm([$message->getMail()=>'Nouvelle demande'])
            ->setTo(['benoit.roche@gmail.com'=>'Benoit Roche Symfony']);
            $email->setBody(
                $this->environnementTwig->render(
                    'mail/mail.html.twig',
                    ['message' =>$message]
                ),
                'text/html'
            );
            $email->attach(\Swift_Attachment::fromPath('documents/presentation.pdf'));
        $this->mail->send($email);
    }

}
?>