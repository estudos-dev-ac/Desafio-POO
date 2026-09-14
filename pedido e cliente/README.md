## 🛒 Desafio 2: Pedido e Cliente

### 💡 A Ideia
Em uma loja virtual, um pedido de compras precisa saber quem é a pessoa que está comprando.

### 📋 O que você deve fazer:

#### Passo 1: Criar a classe `Cliente`
* Crie atributos para guardar o `nome` e o `cpf` do comprador.
* Crie o construtor para preencher esses dados no momento do `new`.
* Crie funções para ler o nome (`getNome()`) e o CPF (`getCpf()`).

#### Passo 2: Criar a classe `Pedido`
* Crie atributos para guardar o `numeroPedido` (ex: `101`) e o `valorTotal` (ex: `180.00`).
*  O pedido deve ter um atributo do tipo **`Cliente`**.
* O construtor do pedido deve receber o número, o valor e o objeto do cliente.
* Crie uma função chamada `exibirResumo()` que mostre na tela:
  * O número do pedido;
  * O nome do cliente e seu CPF;
  * O valor total a pagar.

#### 🧪 O Teste Final:
1. Crie um cliente chamado `"João Silva"`.
2. Crie o pedido número `101`, passando o cliente `"João Silva"` para dentro dele.
3. Chame a função `exibirResumo()` para conferir se os dados do cliente aparecem na compra.