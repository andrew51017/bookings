---
title: How to Book
---

# How to Book

## Add Single

```twig
<form method="post">
    {{ csrfInput() }}
    <input type="hidden" name="action" value="commerce/cart/update-cart" />
    
    {% set variant = product.variants.one() %}
    <input type="hidden" name="purchasableId" value="{{ variant.id }}">
    <input type="hidden" name="options[ticketId]" value="{{ variant.ticket.id }}">
    <input type="number" name="qty" value="1">
    <input type="date" name="options[ticketDate][date]">
    <input type="time" name="options[ticketDate][time]">
    <input type="hidden" name="options[ticketDate][timezone]" value="{{ craft.app.getTimeZone() }}">
    
    <button>Add to Cart</button>
</form>
```

## Add Multiple

```twig
<form method="post">
    {{ csrfInput() }}
    <input type="hidden" name="action" value="commerce/cart/update-cart" />
    
    <ul>
        {% for variant in product.variants %}
            <li>
                <p><strong>{{ variant.title }}</strong> - {{ variant.price|currency }}</p>
                <input type="hidden" name="purchasables[{{loop.index}}]][id]" value="{{ variant.id }}" />
                <input type="hidden" name="purchasables[{{loop.index}}]][options][ticketId]" value="{{ variant.myTicketField.id }}" />
                <input type="date" name="purchasables[{{loop.index}}]][options][ticketDate][date]" />
                <input type="time" name="purchasables[{{loop.index}}]][options][ticketDate][time]" />
                <input type="hidden" name="purchasables[{{loop.index}}]][options][ticketDate][timezone]" value="{{ craft.app.getTimeZone() }}" />
                <input type="number" name="purchasables[{{loop.index}}]][qty]" value="1" />
            </li>
        {% endfor %}
    </ul>
    
    <button>Add to Cart</button>
</form>
```