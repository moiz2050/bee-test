<?php

/**
 * @OA\Schema(
 *     title="Record",
 *     description="Record model",
 *     @OA\Xml(
 *         name="Record"
 *     )
 * )
 */

class Record
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Title",
     *      description="Name of the new record",
     *      example="Waka Waka"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="Artist",
     *      description="Artist of the record",
     *      example="Shakira"
     * )
     *
     * @var string
     */
    public $artist;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;


    /**
     * @OA\Property(
     *      title="Shop ID",
     *      description="Shop ID of the record",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $shop_id;
}
