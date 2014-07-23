<?php
namespace ShiftpiCountryFlags\Service;

/**
 * Mime Type Service
 * @author Andreas Rutz <andreas.rutz@posteo.de>
 * @license MIT
 */
class MimeType
{
    public function determine($data)
    {
        if (!class_exists('finfo')) {
            throw new \Exception('Class finfo required but not found');
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        return $finfo->buffer($data);
    }
} 