<?php

namespace App\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Traits\Dumpable;

class BaseDTO
{
    use Dumpable;
    public function toArray(): array
    {
        $array = (array) $this;
        if (array_key_exists('id', $array)) {
            unset($array['id']);
        }

        return $array;
    }

    public function filterNull(array $skip = []): self
    {
        $attributesArray = (array)$this;

        foreach ($attributesArray as $attribute => $value) {
            if (is_null($value) && (!in_array($attribute, $skip))) unset($this->{$attribute});
        }

        return $this;
    }

    public function filter(array $attributes = [], array $values = [], array $skip = []): self
    {
        $attributesArray = (array)$this;

        $valuesIsSet = count($values);
        $attributesIsSet = count($attributes);

        if ($attributesIsSet || $valuesIsSet) {

            foreach ($attributesArray as $attribute => $value) {

                if ((in_array($value, $values) || in_array($attribute, $attributes) && (!in_array($attribute, $skip)))) {
                    unset($this->{$attribute});
                }
            }
        }

        return $this;
    }

    public static function handleFileStoring(?UploadedFile $file, string $path, ?string $name = null, string $disk = 'public'): string|null
    {
        if (is_null($file)) return null;

        $fullPath =
            $name ?
            $file->storePubliclyAs($path, $name, ['disk' => $disk]) :
            $file->storePublicly($path, $disk);

        return 'storage/' . $fullPath;
    }
}
