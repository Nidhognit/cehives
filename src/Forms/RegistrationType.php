<?php
declare(strict_types=1);

namespace App\Forms;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Имя пользователя',
                'attr' => [
                    'placeholder' => 'Имя пользователя',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Емейл',
                'attr' => [
                    'placeholder' => 'Емейл',
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Пароль (не менее 10 символов)',
                'constraints' => [new Length(['min' => 10])]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}