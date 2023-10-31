<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserProgressDTO;
use App\Http\Services\LessonContentService;
use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function __construct(private readonly LessonService $lessonService,
        private readonly UserProgressService $progressService,
        private readonly LessonContentService $lessonContentService
    )
    {
    }

    public function show(Lesson $lesson)
    {
        $this->authorize('show', $lesson);
        $lesson = $this->lessonService->findFirstById($lesson->id);
        $lessonContent = $this->lessonContentService->getContentForLesson($lesson->id);

        return view('lessons.show',compact(['lesson','lessonContent']));
    }

    public function setLessonFinished(Lesson $lesson)
    {
        $this->progressService->create(new CreateUserProgressDTO(Auth::id(), $lesson->course->user_id, $lesson->id, true));

        return redirect()->route('lessons.show',$lesson);
    }
}
