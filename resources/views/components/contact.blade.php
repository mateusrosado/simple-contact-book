<div class="contact" data-contact-id="{{$contact->id}}">
    <details>
        <summary>
            <div class="picture">{{substr($contact->name, 0, 1)}}</div>
            <span class="name">{{$contact->name}}</span>
        </summary>
        <ul>
            <li>
                <a href="" class="btn-contact-view">
                    <i class="fa-solid fa-eye"></i>
                    <span>Visualizar</span></a>
            </li>
            <li>
                <a href="" class="btn-contact-eddit">
                    <i class="fa-solid fa-pen"></i>
                    <span>Editar</span>
                </a>
            </li>
            <li>
                <a href="" class="btn-contact-destroy">
                    <i class="fa-solid fa-trash"></i>
                    <span>Excluir</span>
                </a>
            </li>
        </ul>
    </details>
</div>

<x-contact-view :contact="$contact"/>
<x-contact-edit :contact="$contact"/>
<x-contact-delete id='{{ $contact->id }}' name='{{ $contact->name }}'/>