<?php
/**
 * ExternalSettings
 *
 * PHP version 7.3
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Extensions\Videoconferencing
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Video Conference Extension
 *
 * These APIs allow you to specify URLs that can be used to interact with a video conferencing application, to allow HubSpot to add video conference links to meeting requests with contacts.
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Extensions\Videoconferencing\Model;

use \ArrayAccess;
use \HubSpot\Client\Crm\Extensions\Videoconferencing\ObjectSerializer;

/**
 * ExternalSettings Class Doc Comment
 *
 * @category Class
 * @description The URLs of the various actions provided by the video conferencing application. All URLs must use the &#x60;https&#x60; protocol.
 * @package  HubSpot\Client\Crm\Extensions\Videoconferencing
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class ExternalSettings implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ExternalSettings';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'create_meeting_url' => 'string',
        'update_meeting_url' => 'string',
        'delete_meeting_url' => 'string',
        'user_verify_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'create_meeting_url' => null,
        'update_meeting_url' => null,
        'delete_meeting_url' => null,
        'user_verify_url' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'create_meeting_url' => 'createMeetingUrl',
        'update_meeting_url' => 'updateMeetingUrl',
        'delete_meeting_url' => 'deleteMeetingUrl',
        'user_verify_url' => 'userVerifyUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'create_meeting_url' => 'setCreateMeetingUrl',
        'update_meeting_url' => 'setUpdateMeetingUrl',
        'delete_meeting_url' => 'setDeleteMeetingUrl',
        'user_verify_url' => 'setUserVerifyUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'create_meeting_url' => 'getCreateMeetingUrl',
        'update_meeting_url' => 'getUpdateMeetingUrl',
        'delete_meeting_url' => 'getDeleteMeetingUrl',
        'user_verify_url' => 'getUserVerifyUrl'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['create_meeting_url'] = $data['create_meeting_url'] ?? null;
        $this->container['update_meeting_url'] = $data['update_meeting_url'] ?? null;
        $this->container['delete_meeting_url'] = $data['delete_meeting_url'] ?? null;
        $this->container['user_verify_url'] = $data['user_verify_url'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['create_meeting_url'] === null) {
            $invalidProperties[] = "'create_meeting_url' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets create_meeting_url
     *
     * @return string
     */
    public function getCreateMeetingUrl()
    {
        return $this->container['create_meeting_url'];
    }

    /**
     * Sets create_meeting_url
     *
     * @param string $create_meeting_url The URL that HubSpot will send requests to create a new video conference.
     *
     * @return self
     */
    public function setCreateMeetingUrl($create_meeting_url)
    {
        $this->container['create_meeting_url'] = $create_meeting_url;

        return $this;
    }

    /**
     * Gets update_meeting_url
     *
     * @return string|null
     */
    public function getUpdateMeetingUrl()
    {
        return $this->container['update_meeting_url'];
    }

    /**
     * Sets update_meeting_url
     *
     * @param string|null $update_meeting_url The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     *
     * @return self
     */
    public function setUpdateMeetingUrl($update_meeting_url)
    {
        $this->container['update_meeting_url'] = $update_meeting_url;

        return $this;
    }

    /**
     * Gets delete_meeting_url
     *
     * @return string|null
     */
    public function getDeleteMeetingUrl()
    {
        return $this->container['delete_meeting_url'];
    }

    /**
     * Sets delete_meeting_url
     *
     * @param string|null $delete_meeting_url The URL that HubSpot will send notifications of meetings that have been deleted in HubSpot.
     *
     * @return self
     */
    public function setDeleteMeetingUrl($delete_meeting_url)
    {
        $this->container['delete_meeting_url'] = $delete_meeting_url;

        return $this;
    }

    /**
     * Gets user_verify_url
     *
     * @return string|null
     */
    public function getUserVerifyUrl()
    {
        return $this->container['user_verify_url'];
    }

    /**
     * Sets user_verify_url
     *
     * @param string|null $user_verify_url The URL that HubSpot will use to verify that a user exists in the video conference application.
     *
     * @return self
     */
    public function setUserVerifyUrl($user_verify_url)
    {
        $this->container['user_verify_url'] = $user_verify_url;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


