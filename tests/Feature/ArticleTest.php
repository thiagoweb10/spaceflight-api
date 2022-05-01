<?php

use App\Models\Article;

it('Criando um novo artigo', function(){
    
    $this->withoutExceptionHandling();

    $attributes = Article::factory()->raw();
    
    $response = $this->post('/api/articles', $attributes);
    $response->assertStatus(201)->assertJson(['message' => 'Registration successfully completed!']);
     
    $this->assertDatabaseHas('articles', $attributes);
});

it('Listando artigos da paginação', function () {

    $this->withoutExceptionHandling();

    $response = $this->get('/api/articles/');

    $response->assertStatus(200);
});

it('Buscando um artigo com ID existente',function(){
    
    $this->withoutExceptionHandling();

    $oArticle = Article::all()->random(1);

    $response = $this->get('/api/articles/'.$oArticle[0]->id);

    $response->assertStatus(200);
});

it('Não pode buscar um artigo com id inexistente',function(){
    
    $this->withoutExceptionHandling();

    $iIdArticle = 22222; 
    $response = $this->get('/api/articles/'.$iIdArticle);

    $response->assertStatus(404)->assertJson(['message' => 'Register not found!']);
});

it('Alterando um artigo', function(){
    
    $this->withoutExceptionHandling();
    
    $oArticle = Article::factory()->create();

    $updateArticle = ['title' => 'Novo Titulo'];

    $response = $this->patch('/api/articles/'.$oArticle->id, $updateArticle);
    
    $response->assertStatus(201)->assertJson(['message' => 'Change made successfully!']);
    
    $this->assertDatabaseHas('articles', $updateArticle);
});

it('Deletando registro',function(){
    
    $this->withoutExceptionHandling();

    $iIdArticle = Article::pluck('id')->take(1)->random();

    $response = $this->delete('/api/articles/'.$iIdArticle);
    $response->assertStatus(200)->assertJson(['message' => 'Record deleted successfully!']);
});

it('Erro ao excluir registro se o ID não for valido.',function(){
    
    $this->withoutExceptionHandling();
    
    $iID = 0;

    $response = $this->delete('/api/articles/'.$iID);
    $response->assertStatus(404)->assertJson(['message' => 'Record not deleted!']);
});