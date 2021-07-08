<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image as PhotoFile;

class ImageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo', FileType::class, [
                'mapped' => false,
                'constraints' => [
                    new PhotoFile([
                        'maxSize' => '16M',
                        'uploadIniSizeErrorMessage' => 'La taille du fichier est trop importante. La taille maximale autorisée est de 2Mo.',
                        'minWidth' => '150',
                        'minWidthMessage' => 'La largeur minimale attendue est de {{ min_width }}px.',
                        'maxWidth' => '2000',
                        'maxWidthMessage' => 'La largeur maximmale attendue est de {{ max_width }}px.',
                        'maxRatio' => '1.78',
                        'maxRatioMessage' => 'Le ratio de l\'image doit être inférieur à 16/9.',
                        'minRatio' => '1.3',
                        'minRatioMessage' => 'Le ratio de l\'image doit être supérieur à 4/3.',
                        'allowPortrait' => false,
                        'allowPortraitMessage' => 'Les images au format portrait ne sont pas autorisées.',
                        'allowSquare' => false,
                        'allowSquareMessage' => 'Les images carrées ne sont pas autorisées.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
