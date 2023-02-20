<?php

namespace Chargemap\OCPI\Versions\V2_2_1\Common\Models;

class PublishTokenType implements \JsonSerializable
{
    private ?string $uid;

    private ?TokenType $type;

    private ?string $visualNumber;

    private ?string $issuer;

    private ?string $groupId;

    public function __construct(?string $uid, ?TokenType $type, ?string $visualNumber, ?string $issuer, ?string $groupId)
    {
        $this->uid = $uid;
        $this->type = $type;
        $this->visualNumber = $visualNumber;
        $this->issuer = $issuer;
        $this->groupId = $groupId;
    }

    public function jsonSerialize(): array
    {
        $return = [];

        if ($this->uid !== null) {
            $return['uid'] = $this->uid;
        }

        if ($this->type !== null) {
            $return['type'] = $this->type;
        }

        if ($this->visualNumber !== null) {
            $return['visual_number'] = $this->visualNumber;
        }

        if ($this->issuer !== null) {
            $return['issuer'] = $this->issuer;
        }

        if ($this->groupId !== null) {
            $return['group_id'] = $this->groupId;
        }

        return $return;
    }
}