<?php

namespace App\Console\Commands;

use App\Models\FileUpload;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class addWaterMark extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermark {firstName?} {lastName?} {middleName?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command use to add watermark into image';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $firstName = $this->argument('firstName');
        $lastName = $this->argument('lastName');
        $middleName = $this->argument('middleName');
        $completeName = $firstName . ' ' . $lastName . ' ' . $middleName;
        try {
            $files = FileUpload::all();
            foreach ($files as $file) {
                // Load image using Image Intervention Library
                $img = Image::make(storage_path('app/public/' . $file->filename));
                // Create watermark canvas
                $watermark = Image::canvas(200, 20);
                $watermark->text($completeName . ' ' . date('Y-m-d h:i'), 10, 10, function ($font) {
                    $font->size(100);
                    $font->color('#FF0000');
                });
                // Resize watermark canvas to fit aspect ratio
                $watermark->resize(null, 50, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->insert($watermark, 'top-right', 10, 10);
                $img->save(storage_path('app/public/watermark/' . $file->filename));
            }
        } catch (\Exception $e) {
            Log::info($e);
        }
    }
}
