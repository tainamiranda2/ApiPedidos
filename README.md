
```markdown
# API para Pedidos

## Modelagem de Dados

### Tabela `pedidos`

A tabela `pedidos` é responsável por armazenar informações sobre os pedidos feitos pelos clientes. Ela possui os seguintes campos:

- `id`: Um identificador único para cada pedido (chave primária).
- `nome`: O nome do pedido. (Tipo de dados: string)
- `descricao`: A descrição do pedido. (Tipo de dados: string)
- `status`: O status atual do pedido. (Tipo de dados: string)
- `cliente_id`: O ID do cliente associado a este pedido. (Tipo de dados: string) 
- `created_at` e `updated_at`: Campos de registro de data e hora para rastrear a criação e a última atualização do pedido.
(Tipo de dados: timestamp)

Essa modelagem de dados é implementada através da seguinte migração:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->string('status');
            $table->string('cliente_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
```

## Testes

Endpoints disponíveis para testes:
- GET
- PUT
- PATCH
- POST
- GET/id
- DELETE

### Testes de Feature para Pedidos:
- Verificar status de dados
- Verificar tipo de dados
- Verificar se tem todas as colunas
- Verificar valores

## Funcionalidades

- Fazer pedidos

## Comando para Rodar Testes

Para executar os testes, utilize o seguinte comando:

```bash
php artisan test
```

## Dependências

- PHPUnit

## Utilização de Migrations e Factories

O projeto utiliza migrations e factories para gerar dados falsos. Isso permite criar um ambiente de teste rico em dados, facilitando a verificação do funcionamento correto da API. As migrations são usadas para definir a estrutura do banco de dados, enquanto as factories são usadas para gerar dados falsos para os testes.
```