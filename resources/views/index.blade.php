@extends('layouts')

@section('content')
  <header class="masthead-bg"></header>
  <header class="masthead">
    <div class="container">
      {{-- <div class="masthead-subheading">GlitterSpain</div> --}}
      <div class="masthead-heading text-uppercase">GlitterSpain</div>
      <a class="btn btn-primary btn-xl text-uppercase" href="{{ url('/tienda') }}">Ver Productos</a>
    </div>
  </header>
  <!-- productos-calientes Grid-->
  <section class="page-section bg-light" id="productos-calientes">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Algunos de nuestros productos</h2>
        <h3 class="section-subheading text-muted">Una muestra de lo que tenemos para ofrecer...</h3>
      </div>
      <div class="row">
        @foreach ($products as $product)
          <div class="col-lg-4 col-sm-6 mb-4">
            <div class="productos-calientes-item">
              <a class="productos-calientes-link" href="{{ route('store.getProduct', ['id' => $product->id]) }}">
                <div class="productos-calientes-hover">
                  <div class="productos-calientes-hover-content">
                    {{-- <i class="fas fa-plus fa-3x"></i> --}}
                    @if ($product->images->isNotEmpty())
                      <img class="productos-calientes-img"
                        src="{{ asset('productImages/' . $product->images->first()->imgURL) }}"
                        alt="{{ $product->name }}">
                    @else
                      <img class="productos-calientes-img" alt="Imagen no encontrada...">
                    @endif
                  </div>
                </div>
                @if ($product->images->isNotEmpty())
                  <img class="productos-calientes-img" src="{{ asset('productImages/' . $product->images->first()->imgURL) }}"
                    alt="{{ $product->name }}">
                @else
                  <img class="productos-calientes-img" alt="Imagen no encontrada...">
                @endif
              </a>
              <div class="productos-calientes-caption">
                <div class="productos-calientes-caption-heading">{{ $product->name }}</div>
                <div class="productos-calientes-caption-subheading text-muted">&euro;{{ $product->price }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="page-section" id="acerca-de-nosotros">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Acerca de nosotros</h2>
        <h3 class="section-subheading text-muted">Conoce un poco la historia de GlitterSpain</h3>
      </div>
      <div>
        <p>
          <b>Bienvenidos a GlitterSpain!</b> Tu tienda de joyería en línea de confianza. Somos una empresa local
          dedicada a ofrecerte las piezas de joyería más elegantes y exclusivas, diseñadas con amor y pasión por la
          artesanía.
        </p>
        <h5>
          Nuestra Misión
        </h5>
        <p>
          En GlitterSpain, nuestra misión es realzar tu belleza y estilo personal con joyas únicas que cuentan
          una
          historia. Creemos en la calidad, la autenticidad y en crear piezas que no solo complementen tu look, sino que
          también se conviertan en tesoros que puedas apreciar para siempre.
        </p>
        <h5>
          Nuestra Historia
        </h5>
        <p>
          Todo comenzó con una visión: llevar la belleza y el arte de la joyería a cada rincón de nuestra comunidad. Desde
          nuestros humildes comienzos, hemos trabajado arduamente para convertirnos en un nombre reconocido por nuestra
          dedicación a la excelencia y la satisfacción del cliente.
        </p>
        <h5>
          Nuestros Valores
        </h5>
        <p>
          Calidad y Artesanía: Cada pieza de nuestra colección está meticulosamente diseñada y creada por artesanos
          talentosos que comparten nuestra pasión por la joyería.
          Atención Personalizada: Nos enorgullecemos de ofrecer un servicio al cliente excepcional. Queremos que cada
          experiencia de compra sea especial y personalizada.
          Compromiso Local: Como una tienda no internacional y muy arraigada en nuestra comunidad, entendemos y valoramos
          los gustos y preferencias de nuestros clientes locales.
        </p>
        <h5>
          ¿Por Qué Elegirnos?
        </h5>
        <ul>
          <li>
            Diseños Exclusivos: Nuestras joyas están diseñadas para destacar y hacerte sentir única.
            Materiales de Alta Calidad: Utilizamos solo los mejores materiales para asegurar que cada pieza sea duradera y
            resplandeciente.
          </li>
          <li>
            Servicio al Cliente Inigualable: Estamos aquí para ayudarte en cada paso del camino, desde la selección de la
            pieza perfecta hasta la entrega y más allá.
          </li>
        </ul>

        <h5>
          Te invitamos a explorar nuestra colección y descubrir las joyas que hemos creado especialmente para ti. Gracias
          por ser parte de nuestra historia y permitirnos ser parte de la tuya.
        </h5>
      </div>
    </div>
  </section>
  <!-- contactenos-->
  <section class="page-section" id="contactenos">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Contáctenos</h2>
        <h3 class="section-subheading text-muted">Nos encantaría responder ante cualquier duda o sugerencia que tenga!
        </h3>
      </div>
      <!-- * * * * * * * * * * * * * * *-->
      <!-- * * SB Forms contactenos Form * *-->
      <!-- * * * * * * * * * * * * * * *-->
      <!-- Formulario integrado con startbootstrap api -->
      <!-- https://startbootstrap.com/solution/contactenos-forms-->
      <!-- TODO: Registrarse y coger API_TOKEN -->
      <form id="contactenosForm" data-sb-form-api-token="API_TOKEN">
        <div class="row align-items-stretch mb-5">
          <div class="col-md-6">
            <div class="form-group">
              <!-- Name input-->
              <input class="form-control" id="name" type="text" placeholder="Nombre *"
                data-sb-validations="required" />
              <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <div class="form-group">
              <!-- Email address input-->
              <input class="form-control" id="email" type="email" placeholder="Correo Electrónico *"
                data-sb-validations="required,email" />
              <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
              <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>
            <div class="form-group mb-md-0">
              <!-- Phone number input-->
              <input class="form-control" id="phone" type="tel" placeholder="Teléfono Móvil *"
                data-sb-validations="required" />
              <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group form-group-textarea mb-md-0">
              <!-- Message input-->
              <textarea class="form-control" id="message" placeholder="Mensaje *" data-sb-validations="required"></textarea>
              <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
            </div>
          </div>
        </div>
        <!-- Submit success message-->
        <!---->
        <!-- This is what your users will see when the form-->
        <!-- has successfully submitted-->
        <div class="d-none" id="submitSuccessMessage">
          <div class="text-center text-white mb-3">
            <div class="fw-bolder">Formulario rellenado correctamente!</div>
            Le responderemos apenas podamos.
          </div>
        </div>
        <!-- Submit error message-->
        <!---->
        <!-- This is what your users will see when there is-->
        <!-- an error submitting the form-->
        <div class="d-none" id="submitErrorMessage">
          <div class="text-center text-danger mb-3">Error enviando mensaje... Ups!</div>
        </div>
        <!-- Submit Button-->
        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton"
            type="submit">Enviar Mensaje</button></div>
      </form>
    </div>
  </section>
@endsection

@section('scripts')
@endsection
