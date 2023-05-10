<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 bg-white border-b border-gray-200">
                        <div class="bg-white">
                            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                                @foreach ($chapters as $item)
                                    <h1>
                                        {{-- echo substr("Battling Records of the Chosen One บันทึกศึกผู้กล้าท้าสวรรค์ - ตอนที่ 1010 อานุภาพไร้ขอบเขต",34); --}}
                                        {{ substr($item->title, 23) }}
                                        {{-- {{ $item->title }} --}}
                                    </h1>
                                    <p style="font-size: 14px">
                                        {{-- {{ substr($item->content,14) }} --}}
                                        {{ $item->content }}
                                    </p>
                                    <br>
                                @endforeach

                                {{ $chapters->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
