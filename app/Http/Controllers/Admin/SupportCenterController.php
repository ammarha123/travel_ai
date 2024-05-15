<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;

class SupportCenterController extends Controller
{
    // Display a listing of FAQs
    public function index()
    {
        $faqs = FAQ::all();
        return view('admin.support-center.index', compact('faqs'));
    }

    // Show the form for creating a new FAQ
    public function create()
    {
        return view('admin.support-center.create');
    }

    // Store a newly created FAQ in storage
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:1000'
        ]);

        FAQ::create($request->all());
        return redirect()->route('support-center.index')->with('success', 'FAQ added successfully');
    }

    // Show the form for editing the specified FAQ
    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.support-center.edit', compact('faq'));
    }

    // Update the specified FAQ in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:1000'
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->update($request->all());
        return redirect()->route('support-center.index')->with('success', 'FAQ updated successfully');
    }

    public function show($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.support-center.show', compact('faq'));
    }
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();
        return redirect()->route('support-center.index')->with('success', 'FAQ deleted successfully');
    }
}
