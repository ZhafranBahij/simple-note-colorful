<?php

use App\Models\Note;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can display notes index page', function () {
    $this->actingAs($this->user)
        ->get(route('note.index'))
        ->assertOk()
        ->assertSeeText('Note');
});

it('can create a note', function () {
    $this->actingAs($this->user)
        ->post(route('note.store'), [
            'title' => 'Test Note',
            'description' => 'Test Description'
        ])
        ->assertRedirect(route('note.index'));

    $this->assertDatabaseHas('notes', [
        'title' => 'Test Note',
        'description' => 'Test Description'
    ]);
});

it('can update a note', function () {
    $note = Note::factory()->create();

    $this->actingAs($this->user)
        ->put(route('note.update', $note->id), [
            'title' => 'Updated Title',
            'description' => 'Updated Description'
        ])
        ->assertRedirect(route('note.index'));

    $this->assertDatabaseHas('notes', [
        'id' => $note->id,
        'title' => 'Updated Title'
    ]);
});

it('can delete a note', function () {
    $note = Note::factory()->create();

    $this->actingAs($this->user)
        ->delete(route('note.destroy', $note->id))
        ->assertRedirect(route('note.index'));

    $this->assertDatabaseMissing('notes', ['id' => $note->id]);
});