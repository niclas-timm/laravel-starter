<?php

test('it renders the user resource index view', function () {
    $this->actingAs($this->user)->get(route('filament.admin.resources.users.index'))->assertOk();
});

test('it renders the user resource shor view', function () {
    $this->actingAs($this->user)->get(route('filament.admin.resources.users.view', $this->user))->assertOk();
});
