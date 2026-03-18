<div>
    {{-- Do your work, then step back. --}}
    <ul class="my-4 space-y-2">

        <!-- foreach / comments -->
        @foreach ($comments as $comment)
        <li class="flex items-center gap-2">
            <p class="text-xs bg-white/10 p-4 rounded-md">
                <span class="text-gray-500">
                    {{ $comment->user->name }} |
                    {{ $comment->created_at->diffForHumans() }}
                </span>
                <span class="text-gray-300">
                    {{ $comment->content }}
                </span>
            </p>

            <div>&hearts;</div>
        </li>
        @endforeach
        <!-- endforeach -->

    </ul>

    @if (!$showComments)
        <p class="text-gray-500">
            <a wire:click='toogle' class="rounded-md text-xs hover:underline cursor-pointer">
                Agregar comentario
            </a>
        </p>
    @else
        Formulario de comentarios
    @endif


</div>
