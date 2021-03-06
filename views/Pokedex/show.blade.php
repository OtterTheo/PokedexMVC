<title>{{ $pokemon->name }}</title>
<h1>{{ $pokemon->name }} N°{{ $pokemon->id }}</h1>


<div id="cards">

    <figure class="card card--{{ strtolower($pokemon->label) }}">
        <div class="card__image-container">
            <img src="/<?=WEBROOT2?>/webroot/img/Pokemouilles/{{ $pokemon->name }}.png" alt="{{ $pokemon->name }}" class="card__image">
        </div>

        <figcaption class="card__caption">
            <h1 class="card__name">{{ $pokemon->name }}</h1>

            <h3 class="card__type">
                {{ $pokemon->label }}
            </h3>

            <table class="card__stats">
                <tbody><tr>
                    <th>HP</th>
                    <td>55</td>
                </tr>
                <tr>
                    <th>Attaque</th>
                    <td>55</td>
                </tr>

                <tr>
                    <th>Défense</th>
                    <td>50</td>
                </tr>

                <tr>
                    <th>Attaque Spéciale</th>
                    <td>45</td>
                </tr>
                <tr>
                    <th>Défense Spéciale</th>
                    <td>65</td>
                </tr>
                <tr>
                    <th>Vitesse</th>
                    <td>55</td>
                </tr>
                </tbody></table>

            <div class="card__abilities">
                <h4 class="card__ability">
                    <span class="card__label">Abilité</span>
                    Run Away
                </h4>
                <h4 class="card__ability">
                    <span class="card__label">Capacité Cachée</span>
                    Anticipation
                </h4>
            </div>
        </figcaption>
    </figure>


</div>


<script id="card-template" type="text/x-handlebars-template">
<figure class="card card--{{type}}">
  <div class="card__image-container">
    <img src="{{imageAddress}}" alt="{{name}}" class="card__image">
  </div>

  <figcaption class="card__caption">
    <h1 class="card__name">{{name}}</h1>

    <h3 class="card__type">e
      {{type}}
    </h3>

    <table class="card__stats">
      <tr>
        <th>HP</th>
        <td>{{hp}}</td>
      </tr>
      <tr>
        <th>Attack</th>
        <td>{{attack}}</td>
      </tr>

      <tr>
        <th>Defense</th>
        <td>{{defense}}</td>
      </tr>

      <tr>
        <th>Special Attack</th>
        <td>{{spAttack}}</td>
      </tr>
      <tr>
        <th>Special Defense</th>
        <td>{{spDefense}}</td>
      </tr>
      <tr>
        <th>Speed</th>
        <td>{{speed}}</td>
      </tr>
    </table>

    <div class="card__abilities">
      <h4 class="card__ability">
        <span class="card__label">Ability</span>
        {{ability1}}
    </h4>
    <h4 class="card__ability">
      <span class="card__label">Hidden Ability</span>
{{ability2}}
    </h4>
  </div>
</figcaption>
</figure>

</script>


