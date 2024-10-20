@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
  <div class="max-w-md mx-auto mt-10">
      <form action="{{route('post.store')}}" method="POST">
          @csrf
          <label for="content" class="block text-sm font-medium text-gray-900 mb-1">What's on Your Thoughts?</label>
          <textarea id="content" name="content" rows="4"
              class="block w-full rounded-md border border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500 text-gray-900 sm:text-sm p-2 mb-2"
              placeholder="Write something..."></textarea>
          <div class="flex justify-end space-x-2">
              <button type="reset" class="bg-white px-2 rounded-md border shadow-sm">Cancel</button>
              <button type="submit" class="bg-orange-600 text-white px-4 rounded-md border shadow-sm hover:bg-orange-700 hover:shadow-sm">Post</button>
          </div>
      </form>
  </div>

  <!-- Recent Updates Section -->
  <div class="container mx-auto p-5 mt-10 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold">Recent Updates</h2>
    <div class="space-y-4 mt-5">
        @foreach ($posts as $post)
        <div class="bg-white p-4 rounded-lg shadow flex justify-between items-start">
            <div class="flex-grow">
                <div class="mb-2">
                    <p class="font-semibold">{{ $post->user->name }}</p>
                    <p class="text-sm text-gray-500">{{'@'}}{{ $post->user->username }} - {{ $post->created_at->format('d M Y') }}</p>
                </div>
                <p class="text-gray-800">{{ $post->content }}</p>

                <!-- Message icon for showing replies if any -->
                <div x-data="{ showReplies: false }">
                    @if ($post->comments->count() > 0)
                        <button @click="showReplies = !showReplies" class="mt-2 text-sm bg-orange-500 hover:bg-orange-600 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                            <i :class="showReplies ? 'fas fa-comments' : 'far fa-comments'"></i> {{ $post->comments->count() }}
                        </button>

                        <!-- Show replies when toggled -->
                        <div x-show="showReplies" x-transition>
                            @foreach ($post->comments as $comment)
                                <div class="mt-2 text-sm">
                                    <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Reply form on the right side of the card -->
            <div x-data="{ showReplyForm: false }" class="ml-4">
                <button @click="showReplyForm = !showReplyForm" class="text-xs text-orange-500 mt-12">Reply</button>
                <div x-show="showReplyForm" x-transition>
                    <form action="{{ route('comment.store', $post->id) }}" method="POST" class="mt-2">
                        @csrf
                        <input type="text" name="content" class="border p-1 text-sm w-full focus:ring-orange-500 focus:border-orange-500" placeholder="Write a reply...">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white py-1 px-2 rounded mt-1">Reply</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  </div>

  <div class="container mx-auto p-5 mt-10 rounded-md shadow-md mb-10">
      <h2 class="text-2xl font-semibold mb-5">Enterprise</h2>
      <div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden">
          <!-- Slider Container -->
          <div class="relative max-w-lg mx-auto overflow-hidden">
            <!-- Slider Content (Images) -->
            <div id="cardSlider" class="flex transition-transform duration-500">
                <img src="https://via.placeholder.com/400x200?text=Slide+1"
                    class="w-full flex-shrink-0" alt="Slide 1">
                <img src="https://via.placeholder.com/400x200?text=Slide+2"
                    class="w-full flex-shrink-0" alt="Slide 2">
                <img src="https://via.placeholder.com/400x200?text=Slide+3"
                    class="w-full flex-shrink-0" alt="Slide 3">
            </div>

            <!-- Navigation Buttons -->
            <button id="prevCard"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white px-4 py-2 shadow-md">
                Prev
            </button>
            <button id="nextCard"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white px-4 py-2 shadow-md">
                Next
            </button>
          </div>
          <div class="p-4">
            <h2 class="text-xl font-bold mb-2">Card Title</h2>
            <p class="text-gray-600 mb-4">
              This is a simple card component with a title, some text, and a button.
            </p>
            <button
              class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">
              Learn More
            </button>
          </div>
      </div>
  </div>
@endsection