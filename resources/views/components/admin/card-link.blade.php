@props([
  'title' => 'Test', 'value' => 'Test', 'href' => '#',
])

<a href="{{ $href }}" class="card border-left-primary shadow h-100 py-2">
  <div class="card-body">
      <div class="row no-gutters align-items-center">
          <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  {{ $title }}
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $value }}</div>
          </div>
          <div class="col-auto">
            @if ($icon)
              {{ $icon }}
            @endif
          </div>
      </div>
  </div>
</a>
