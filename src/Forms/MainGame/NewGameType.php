<?php
declare(strict_types=1);

namespace App\Forms\MainGame;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class NewGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'translation@game_name',
            'attr' => [
                'placeholder' => 'translation@game_name',
            ],
            'constraints' => [new Length(['min' => 3])],
            'translation_domain' => 'forms'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            'translation_domain' => 'forms'
        ]);
    }
}