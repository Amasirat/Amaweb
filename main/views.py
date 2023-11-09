from django.shortcuts import render

templates = {
    "index":"main/index.html",
}

def index(request):
    return render(request, templates["index"])