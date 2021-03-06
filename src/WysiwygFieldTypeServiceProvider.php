<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class WysiwygFieldTypeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType
 */
class WysiwygFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'streams/wysiwyg-field_type/index'           => 'Anomaly\WysiwygFieldType\Http\Controller\FilesController@index',
        'streams/wysiwyg-field_type/choose'          => 'Anomaly\WysiwygFieldType\Http\Controller\FilesController@choose',
        'streams/wysiwyg-field_type/selected'        => 'Anomaly\WysiwygFieldType\Http\Controller\FilesController@selected',
        'streams/wysiwyg-field_type/upload/{folder}' => 'Anomaly\WysiwygFieldType\Http\Controller\UploadController@index',
        'streams/wysiwyg-field_type/handle'          => 'Anomaly\WysiwygFieldType\Http\Controller\UploadController@upload',
        'streams/wysiwyg-field_type/recent'          => 'Anomaly\WysiwygFieldType\Http\Controller\UploadController@recent'
    ];

}
