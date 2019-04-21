<?php
declare(strict_types=1);

namespace Cehevis\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_username', TextType::class, [
                'label' => 'Имя пользователя/Емейл',
                'attr' => [
                    'placeholder' => 'Имя пользователя/Емейл',
                ],
                'constraints' => [new NotBlank()]
            ])
            ->add('_password', PasswordType::class, [
                'label' => 'Пароль',
                'constraints' => [new Length(['min' => 10])]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
        ));
    }
}