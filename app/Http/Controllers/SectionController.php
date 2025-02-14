<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListSectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __invoke(ListSectionRequest $request)
    {
        $sections = Section::where('class_id', $request->class_id)->get();
        return  SectionResource::collection($sections);
    }
}
