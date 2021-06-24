<?php

namespace AppBundle\DataFixtures\Provider;

use Faker\Provider\Base as BaseProvider;

class ImageProvider extends BaseProvider
{
    const ORIGIN_FILE = __DIR__ . '/../../../fixtures/images/';
    const DESTINATION_FILE = __DIR__ . '/../../../public/images/uploads/';

    /**
     * @var array list user images name
     */
    const USER_IMAGE_PROVIDER = [
    'user1',
    'user2',
    'user3',
    'user4',
    'user5',
    'user6',
    'user7',
    'user8',
    'user9',
    'user10',
    ];

    /**
     * @var array list figure images name
     */
    const FIGURE_IMAGE_PROVIDER = [
        'figure1',
        'figure2',
        'figure3',
        'figure4',
        'figure5',
        'figure6',
        'figure7',
        'figure8',
        'figure9',
        'figure10',
        'figure11',
        'figure12',
        'figure13',
        'figure14',
        'figure15',
        'figure16',
        'figure17',
        'figure18',
        'figure19',
        'figure20',
    ];

    public function userImage(): string
    {
        $image = self::randomElement(self::USER_IMAGE_PROVIDER) . '.jpg';
        $renamedImage = bin2hex(\openssl_random_pseudo_bytes(6)) . '.jpg';
        copy(
            self::ORIGIN_FILE . 'users/' . $image,
            self::DESTINATION_FILE . 'users/' . $renamedImage
        );

        return $renamedImage;
    }

    public function figureImage(): string
    {
        $image = self::randomElement(self::FIGURE_IMAGE_PROVIDER) . '.jpg';
        $renamedImage = bin2hex(\openssl_random_pseudo_bytes(6)) . '.jpg';
        copy(
            self::ORIGIN_FILE . 'figures/' . $image,
            self::DESTINATION_FILE . 'figures/' . $renamedImage
        );

        return $renamedImage;
    }
}
