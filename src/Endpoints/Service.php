<?php
/**
 * Service
 *
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Qdrant\Endpoints;

use Qdrant\Exception\InvalidArgumentException;
use Qdrant\Response;

class Service extends AbstractEndpoint
{
    /**
     * # Collect telemetry data
     * Collect telemetry data including app info, system info, collections info, cluster info, configs and statistics
     *
     * @throws InvalidArgumentException
     */
    public function telemetry(bool $anonymize): Response
    {
        return $this->client->execute(
            $this->createRequest('GET', '/telemetry')
        );
    }

    /**
     * # Collect Prometheus metrics data
     * Collect metrics data including app info, collections info, cluster info and statistics
     *
     * @throws InvalidArgumentException
     */
    public function metrics(bool $anonymize): Response
    {
        return $this->client->execute(
            $this->createRequest('POST', '/metrics')
        );
    }

    /**
     * # Delete storage snapshot
     * Delete snapshot of the whole storage
     *
     * @throws InvalidArgumentException
     */
    public function setLocks(array $body): Response
    {
        return $this->client->execute(
            $this->createRequest('POST', '/locks', $body)
        );
    }

    /**
     * # Download storage snapshot
     * Download specified snapshot of the whole storage as a file
     *
     * @throws InvalidArgumentException
     */
    public function getLocks(): Response
    {
        return $this->client->execute(
            $this->createRequest('GET', '/locks')
        );
    }
}