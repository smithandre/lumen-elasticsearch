<?php

namespace Nord\Lumen\Elasticsearch\Pipelines\Payloads;

/**
 * Class ApplyMigrationPayload
 * @package Nord\Lumen\Elasticsearch\Pipelines\Payloads
 */
class ApplyMigrationPayload extends MigrationPayload
{

    /**
     * @var string
     */
    private $targetVersionFile;

    /**
     * @param string $targetVersionFile
     */
    public function setTargetVersionFile($targetVersionFile)
    {
        $this->targetVersionFile = $targetVersionFile;
    }

    /**
     * @return string
     */
    public function getTargetVersionPath()
    {
        return sprintf('%s/%s', $this->getIndexVersionsPath(), $this->targetVersionFile);
    }

    /**
     * @return array
     */
    public function getTargetConfiguration()
    {
        return include $this->getTargetVersionPath();
    }

    /**
     * @return string
     */
    public function getTargetVersionName()
    {
        return $this->getTargetConfiguration()['index'];
    }
}
