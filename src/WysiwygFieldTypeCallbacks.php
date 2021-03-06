<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\WysiwygFieldType\Command\DeleteDirectory;
use Anomaly\WysiwygFieldType\Command\PutFile;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class WysiwygFieldTypeCallbacks
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType
 */
class WysiwygFieldTypeCallbacks
{

    use DispatchesJobs;

    /**
     * Fired after an entry is saved.
     *
     * @param WysiwygFieldType $fieldType
     */
    public function onEntrySaved(WysiwygFieldType $fieldType)
    {
        if (!$fieldType->getLocale()) {
            $this->dispatch(new PutFile($fieldType));
        }
    }

    /**
     * Fired after an entry translation is saved.
     *
     * @param WysiwygFieldType $fieldType
     */
    public function onEntryTranslationSaved(WysiwygFieldType $fieldType)
    {
        $this->dispatch(new PutFile($fieldType));
    }

    /**
     * Fired after an entry is deleted.
     *
     * @param WysiwygFieldType $fieldType
     */
    public function onEntryDeleted(WysiwygFieldType $fieldType)
    {
        if (!$fieldType->getLocale()) {
            $this->dispatch(new DeleteDirectory($fieldType));
        }
    }

    /**
     * Fired after an entry translation is deleted.
     *
     * @param WysiwygFieldType $fieldType
     */
    public function onEntryTranslationDeleted(WysiwygFieldType $fieldType)
    {
        $this->dispatch(new DeleteDirectory($fieldType));
    }
}
