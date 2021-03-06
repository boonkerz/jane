<?php

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Joli\Jane\Tests\Expected\Normalizer;

use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Joli\\Jane\\Tests\\Expected\\Model\\Test') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Joli\Jane\Tests\Expected\Model\Test) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        $object = new \Joli\Jane\Tests\Expected\Model\Test();
        if (property_exists($data, 'child')) {
            $object->setChild($this->denormalizer->denormalize($data->{'child'}, 'Joli\\Jane\\Tests\\Expected\\Model\\Childtype', 'json', $context));
        }
        if (property_exists($data, 'parent')) {
            $object->setParent($this->denormalizer->denormalize($data->{'parent'}, 'Joli\\Jane\\Tests\\Expected\\Model\\Parenttype', 'json', $context));
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getChild()) {
            $data->{'child'} = $this->normalizer->normalize($object->getChild(), 'json', $context);
        }
        if (null !== $object->getParent()) {
            $data->{'parent'} = $this->normalizer->normalize($object->getParent(), 'json', $context);
        }

        return $data;
    }
}
