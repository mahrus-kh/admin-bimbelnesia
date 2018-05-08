<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TutoringAgency extends Model
{
    protected $fillable = [
        'category_id', 'sub_category_id', 'slug', 'tutoring_agency', 'logo_image', 'address', 'description', 'tags', 'verified', 'rating', 'total_views'
    ];

    protected $casts = [
        'category_id' => 'array',
        'sub_category_id' => 'array',
        'tags' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function excellence()
    {
        return $this->hasMany(Excellence::class);
    }

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }

    public function study_program()
    {
        return $this->hasMany(StudyProgram::class);
    }

    public function accountLogin()
    {
        return $this->hasOne(AccountLogin::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function term()
    {
        return $this->hasOne(Term::class);
    }

    public function showAlphabetDirectory()
    {
        $alphabet = TutoringAgency::selectRaw('LEFT(tutoring_agency,1) as alphabet')
            ->distinct()
            ->orderBy('tutoring_agency', 'ASC')
            ->get();

        return $alphabet;
    }

    public function showDirectoryByAlphabet()
    {
        foreach ($this->showAlphabetDirectory() as $alphabet) {
            $lembaga [$alphabet->alphabet] = TutoringAgency::select('tutoring_agency', 'slug')
                ->where('tutoring_agency', 'like', $alphabet->alphabet . '%')
                ->limit(9)
                ->orderBy('tutoring_agency', 'ASC')
                ->get();
        }
        return $lembaga;
    }

    public function showDirectoryByOneAlphabet($alphabet)
    {
        $lembaga  = TutoringAgency::select('tutoring_agency', 'slug')
            ->where('tutoring_agency', 'like', $alphabet . '%')
            ->orderBy('tutoring_agency', 'ASC')
            ->get();

        return $lembaga;
    }

    public function showByCategory($category_id)
    {
        $lembaga = TutoringAgency::select('slug','tutoring_agency','rating')
            ->where('category_id', 'like', '%' . $category_id . '%')
            ->orderBy('rating', 'DESC')
            ->get();

        return $lembaga;
    }

    public function showBySubCategory($sub_category_id)
    {
        $lembaga = TutoringAgency::select('slug','tutoring_agency','rating')
            ->where('sub_category_id', 'like', '%' . $sub_category_id . '%')
            ->orderBy('rating', 'DESC')
            ->get();

        return $lembaga;
    }
}
