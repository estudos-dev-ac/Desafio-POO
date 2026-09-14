

## 📱 Desafio 1: Celular e Bateria

### 💡 A Ideia
Um celular não funciona sozinho, ele precisa ter uma bateria colocada dentro dele para ter energia.

### 📋 O que você deve fazer:

#### Passo 1: Criar a classe `Bateria` (a peça menor)
* Crie o atributo para guardar a carga da bateria (ex: começa em `100`%).
* Crie uma função chamada `gastarEnergia()` que diminua a carga em `10%` toda vez que for chamada.
* Crie uma função chamada `getCarga()` para poder ler quanto de bateria ainda resta.

#### Passo 2: Criar a classe `Celular` (a peça que usa a bateria)
* Crie o atributo para guardar a marca do aparelho (ex: `"Samsung"`).
* O celular deve ter um atributo do tipo **`Bateria`**.
* O construtor do celular deve receber a marca e o objeto da bateria já pronto.
* Crie uma função chamada `jogarJogo()` ("apenas uma funcao simples que exiba uma mensagem")  na tela e mande a bateria gastar energia (chamar o metodo que gastaEnergia).

#### 🧪 O Teste Final:
1. Crie um objeto da classe `Bateria`.
2. Crie um objeto da classe `Celular`, passando essa bateria para dentro dele.
3. Chame a função `jogarJogo()` duas vezes e exiba na tela quanto de bateria ainda sobrou.

---

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

---

## 💻 Desafio 3: Computador e Processador

### 💡 A Ideia
Você vai montar um computador colocando uma peça de hardware (o processador) dentro dele.

### 📋 O que você deve fazer:

#### Passo 1: Criar a classe `Processador`
* Crie atributos para guardar a marca e modelo (ex: `"Intel Core i5"`).
* Crie uma função chamada `processarDados()` que mostre na tela:  
  *"⚙️ Processador trabalhando e calculando dados..."*.

#### Passo 2: Criar a classe `Computador`
* Crie um atributo para guardar a marca do computador (ex: `"Dell"`).
* O computador deve ter um atributo do tipo **`Processador`**.
* O construtor do computador deve receber a marca e o objeto processador.
* Crie uma função chamada `ligar()` que avise que a máquina ligou e mande o processador interno rodar a função `processarDados()`.

#### 🧪 O Teste Final:
1. Crie o processador.
2. Crie o computador colocando esse processador dentro dele.
3. Chame a função `ligar()` do computador.

---
