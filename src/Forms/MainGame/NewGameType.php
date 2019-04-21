<?php
declare(strict_types=1);

namespace App\Forms\MainGame;

use App\Entity\MapTemplate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class NewGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addNameBox($builder, $options);
        $this->addMapTemplateBox($builder, $options);
    }

    protected function addNameBox(FormBuilderInterface $builder, array &$options): void
    {
        $builder->add('name', TextType::class, [
            'label' => 'translation@game_name',
            'attr' => [
                'placeholder' => 'translation@game_name',
            ],
            'constraints' => [new Length(['min' => 3])],
        ]);
    }

    protected function addMapTemplateBox(FormBuilderInterface $builder, array &$options): void
    {
        $mapList = $options['mapList'];
        $choices = [];
        /** @var MapTemplate $map */
        foreach ($mapList as $map) {
            $name = $map->getName() . ' (' . $map->getHeight() . ' x ' . $map->getWidth() . ')';
            $choices[$name] = $map->getId();
        }
        $builder->add('map_template', ChoiceType::class, [
            'label' => 'translation@game_map_template',
            'attr' => [
                'placeholder' => 'translation@game_map_template',
            ],
            'choices' => $choices
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
            'translation_domain' => 'forms'
        ]);

        $resolver->setDefault('mapList', []);
        $resolver->setAllowedTypes('mapList', ['array']);
    }
}