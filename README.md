# Desafio — Sistema de Pedidos de uma Loja

Desenvolva em PHP um sistema de pedidos para uma loja utilizando **Programação Orientada a Objetos e Interfaces**.

O sistema deverá possuir uma interface chamada **MetodoPagamento**, responsável por definir um método para realizar pagamentos. Crie três formas diferentes de pagamento: **Pix, Cartão de Crédito e Boleto**. Todas deverão implementar essa interface e possuir seu próprio comportamento ao realizar um pagamento.

Crie também uma interface chamada **Notificavel**, responsável por definir o comportamento de envio de notificações. Crie duas formas de notificação: **Email e WhatsApp**, ambas implementando essa interface.

O sistema deverá possuir as classes **Produto, Cliente e Pedido**. Um produto deverá possuir nome e preço. Um cliente deverá possuir nome e email. Um pedido deverá possuir um cliente, uma lista de produtos, uma forma de pagamento e uma forma de notificação.

A classe **Pedido** deverá permitir adicionar vários produtos e possuir um método responsável por calcular o valor total da compra.

Também deverá existir um método para finalizar o pedido. Ao finalizar, o sistema deverá calcular o valor total dos produtos, realizar o pagamento utilizando a forma de pagamento escolhida e verificar se o pagamento foi aprovado. Caso seja aprovado, uma notificação deverá ser enviada ao cliente utilizando a forma de notificação escolhida.

O sistema deve permitir trocar a forma de pagamento entre **Pix, Cartão de Crédito e Boleto** sem precisar modificar a classe **Pedido**.

Da mesma forma, deve ser possível trocar a forma de notificação entre **Email e WhatsApp** sem alterar a classe **Pedido**.
