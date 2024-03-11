<?php

class ProductPhotoValidatorSchema extends sfValidatorSchema
{
    protected function configure($options = array(), $messages = array())
    {
        $this->addMessage('caption', 'The caption is required.');
        $this->addMessage('filename', 'The filename is required.');
    }

    protected function doClean($values)
    {
        $errorSchema = new sfValidatorErrorSchema($this);

        foreach($values as $key => $value)
        {
            $errorSchemaLocal = new sfValidatorErrorSchema($this);

            // se ha rellenado el campo filename pero no el campo caption
            if ($value['filename'] && !$value['caption'])
            {
                $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'caption');
            }

            // se ha rellenado el campo caption pero no el campo filename
            if ($value['caption'] && !$value['filename'])
            {
                $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'filename');
            }

            // no se ha rellenado ni caption ni filename, se eliminan los valores vacíos
            if (!$value['filename'] && !$value['caption'])
            {
                unset($values[$key]);
            }

            // algun error para este formulario embebido
            if (count($errorSchemaLocal))
            {
                $errorSchema->addError($errorSchemaLocal, (string) $key);
            }
        }

        // lanza un error para el formulario principal
        if (count($errorSchema))
        {
            throw new sfValidatorErrorSchema($this, $errorSchema);
        }

        return $values;
    }
}