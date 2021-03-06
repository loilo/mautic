<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\PageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ConfigType.
 */
class ConfigTrackingPageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('track_by_tracking_url', 'yesno_button_group', [
            'label' => 'mautic.page.config.form.track.by.tracking.url',
            'data'  => isset($options['data']['track_by_tracking_url']) ? (bool) $options['data']['track_by_tracking_url'] : true,
            'attr'  => [
                'tooltip' => 'mautic.page.config.form.track.by.tracking.url.tooltip',
            ],
        ]);

        $builder->add('track_by_fingerprint', 'yesno_button_group', [
            'label' => 'mautic.page.config.form.track.by.fingerprint',
            'data'  => isset($options['data']['track_by_fingerprint']) ? (bool) $options['data']['track_by_fingerprint'] : false,
            'attr'  => [
                'tooltip' => 'mautic.page.config.form.track.by.fingerprint.tooltip',
            ],
        ]);

        $builder->add(
            'anonymize_ip',
            'yesno_button_group',
            [
                'label' => 'mautic.page.config.form.anonymize_ip',
                'data'  => (bool) $options['data']['anonymize_ip'],
                'attr'  => [
                    'tooltip' => 'mautic.page.config.form.anonymize_ip.tooltip',
                ],
            ]
        );

        $builder->add(
            'track_contact_by_ip',
            'yesno_button_group',
            [
                'label' => 'mautic.page.config.form.track_contact_by_ip',
                'data'  => isset($options['data']['track_contact_by_ip']) ? (bool) $options['data']['track_contact_by_ip'] : false,
                'attr'  => [
                    'tooltip'      => 'mautic.page.config.form.track_contact_by_ip.tooltip',
                    'data-show-on' => '{"config_trackingconfig_anonymize_ip_1":"checked"}',
                ],
            ]
        );

        $builder->add(
            'facebook_pixel_id',
            'text',
            [
                'label' => 'mautic.page.config.form.facebook.pixel.id',
                'attr'  => [
                    'class' => 'form-control',
                ],
                'required' => false,
            ]
        );

        $builder->add(
            'facebook_pixel_trackingpage_enabled',
            'yesno_button_group',
            [
                'label' => 'mautic.page.config.form.tracking.trackingpage.enabled',
                'data'  => (bool) $options['data']['facebook_pixel_trackingpage_enabled'],
            ]
        );

        $builder->add(
            'facebook_pixel_landingpage_enabled',
            'yesno_button_group',
            [
                'label' => 'mautic.page.config.form.tracking.landingpage.enabled',
                'data'  => (bool) $options['data']['facebook_pixel_landingpage_enabled'],
            ]
        );

        $builder->add(
            'google_analytics_id',
            'text',
            [
                'label' => 'mautic.page.config.form.google.analytics.id',
                'attr'  => [
                    'class' => 'form-control',
                ],
                'required' => false,
            ]
        );

        $builder->add(
            'google_analytics_trackingpage_enabled',
            'yesno_button_group',
            [
                'label' => 'mautic.page.config.form.tracking.trackingpage.enabled',
                'data'  => (bool) $options['data']['google_analytics_trackingpage_enabled'],
            ]
        );

        $builder->add(
            'google_analytics_landingpage_enabled',
            'yesno_button_group',
            [
                'label' => 'mautic.page.config.form.tracking.landingpage.enabled',
                'data'  => (bool) $options['data']['google_analytics_landingpage_enabled'],
            ]
        );

        $builder->add(
            'google_analytics_anonymize_ip',
            'yesno_button_group',
            [
                'label' => 'mautic.page.config.form.tracking.anonymize.ip.enabled',
                'data'  => (bool) (isset($options['data']['google_analytics_anonymize_ip']) ? $options['data']['google_analytics_anonymize_ip'] : false),
                'attr'  => [
                    'tooltip' => 'mautic.page.config.form.tracking.anonymize.ip.enabled.tooltip',
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'trackingconfig';
    }
}
