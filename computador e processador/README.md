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