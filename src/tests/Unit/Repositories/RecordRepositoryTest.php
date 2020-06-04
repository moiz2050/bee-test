<?php
namespace Tests\Unit\Repositories;

use App\Models\Record;
use App\Repositories\RecordRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Mockery;
use Tests\TestCase;

class RecordRepositoryTest extends TestCase
{
    public RecordRepository $recordRepository;

    /** @var Record | Mockery\MockInterface */
    public $record;

    public function setUp(): void
    {
        parent::setUp();

        $this->record = Mockery::mock(Record::class);

        $this->recordRepository = new RecordRepository($this->record);
    }

    public function testCreate()
    {
        $queryBuilderMock = Mockery::mock(Builder::class);

        $data = ['title' => 'Waka Waka', 'artist' => 'Shakira', 'genre' => 'pop'];
        $this->record->shouldReceive('query')->once()->andReturn($queryBuilderMock);
        $queryBuilderMock->shouldReceive('create')->andReturn($this->record);

        $record = $this->recordRepository->create($data);

        $this->assertInstanceOf(Record::class, $record);
    }

    public function testUpdate()
    {
        $data = ['title' => 'Waka Waka', 'artist' => 'Shakira', 'genre' => 'pop'];
        $record = Mockery::mock(Record::class);
        $record->shouldReceive('update')->once()->andReturnTrue();

        $record = $this->recordRepository->update($record, $data);

        $this->assertInstanceOf(Record::class, $record);
    }

    public function testDelete()
    {
        $record = Mockery::mock(Record::class);
        $record->shouldReceive('delete')->once()->andReturnTrue();

        $record = $this->recordRepository->delete($record);

        $this->assertNull($record);
    }

    public function testSearch()
    {
        $queryBuilderMock = Mockery::mock(Builder::class);
        $collectionMock = Mockery::mock(Collection::class);

        $this->record->shouldReceive('search')->once()->andReturn($queryBuilderMock);
        $queryBuilderMock->shouldReceive('orderBy')->once()->andReturn($queryBuilderMock);
        $queryBuilderMock->shouldReceive('get')->once()->andReturn($collectionMock);

        $records = $this->recordRepository->search("waka");

        $this->assertInstanceOf(Collection::class, $records);
    }
}
