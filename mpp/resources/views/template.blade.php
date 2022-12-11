<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MPP</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
        @vite('resources/css/app.css')
    </head>
    <body class="dark">
        <div id="app" class="min-h-screen bg-white dark:bg-gray-darkest text-gray-darkest dark:text-white py-8 px-4">
            <div class="w-full h-full bg-white dark:bg-gray-darkest text-gray-darkest dark:text-white p-4 space-y-4">
                <div class="bg-white dark:bg-gray-dark border border-gray-dark fixed w-56 top-0 right-0 ml-auto p-4 rounded-md shadow-md">
                    <div>
                        <label for="dark-mode-toggle" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" id="dark-mode-toggle" class="sr-only peer" checked="" onclick="toggleDarkMode()">
                            <div class="
                                w-11 h-6 bg-white peer-checked:bg-cyan hover:peer-checked:bg-cyan-dark border border-gray hover:border-gray-dark peer-checked:border-0 rounded-full
                                after:absolute after:top-[2px] after:left-[3px] peer-checked:after:left-[1px] after:h-5 after:w-5
                                after:bg-cyan hover:after:bg-cyan-dark peer-checked:after:bg-white peer-checked:hover:after:bg-gray-very-lightest after:rounded-full
                                peer-checked:after:translate-x-full after:transition-all
                            "></div>
                            <span class="ml-3 text-sm font-medium">Mode sombre</span>
                        </label>
                    </div>
                    <span>Breakpoints : </span>
                    <span class="md:hidden">sm</span>
                    <span class="hidden md:inline lg:hidden">md</span>
                    <span class="hidden lg:inline xl:hidden">lg</span>
                    <span class="hidden xl:inline 2xl:hidden">xl</span>
                    <span class="hidden 2xl:inline">2xl</span>
                </div>
                <p class="text-4xl w-min mx-auto pb-4">Template</p>
                <hr>
                <div class="w-full">
                    <p class="text-2xl mb-4 w-min mx-auto">Fontsizes</p>
                    <p class="text-xs">text-xs</p>
                    <p class="text-sm">text-sm</p>
                    <p class="text-base">text-base</p>
                    <p class="text-lg">text-lg</p>
                    <p class="text-xl">text-xl</p>
                    <p class="text-2xl">text-2xl</p>
                    <p class="text-3xl">text-3xl</p>
                    <p class="text-4xl">text-4xl</p>
                    <p class="text-5xl">text-5xl</p>
                    <p class="title">title</p>
                </div>
                <hr>
                <div class="w-full">
                    <p class="text-2xl mb-4 w-min mx-auto">Colors</p>
                    <div class="grid gap-2 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                        <div class="w-40 h-20 bg-white flex justify-center items-center border border-gray-very-lightest dark:text-gray-darkest mx-auto"><p>bg-white</p></div>
                        <div class="w-40 h-20 bg-gray-very-lightest flex justify-center items-center dark:text-gray-darkest mx-auto"><p>bg-gray-very-lightest</p></div>
                        <div class="w-40 h-20 bg-gray-lightest flex justify-center items-center dark:text-gray-darkest mx-auto"><p>bg-gray-lightest</p></div>
                        <div class="w-40 h-20 bg-gray-light flex justify-center items-center mx-auto"><p>bg-gray-light</p></div>
                        <div class="w-40 h-20 bg-gray flex justify-center items-center mx-auto"><p>bg-gray</p></div>
                        <div class="w-40 h-20 bg-gray-dark flex justify-center items-center mx-auto text-white"><p>bg-gray-dark</p></div>
                        <div class="w-40 h-20 bg-gray-darkest flex justify-center items-center border border-gray-dark mx-auto text-white"><p>bg-gray-darkest</p></div>
                        <div class="w-40 h-20 bg-black flex justify-center items-center mx-auto text-white"><p>bg-black</p></div>
                        <div class="w-40 h-20 bg-cyan flex justify-center items-center mx-auto"><p>bg-cyan</p></div>
                        <div class="w-40 h-20 bg-cyan-dark flex justify-center items-center mx-auto"><p>bg-cyan-dark</p></div>
                        <div class="w-40 h-20 bg-red-light flex justify-center items-center mx-auto"><p>bg-red-light</p></div>
                        <div class="w-40 h-20 bg-red flex justify-center items-center mx-auto"><p>bg-red</p></div>
                        <div class="w-40 h-20 bg-red-dark flex justify-center items-center mx-auto"><p>bg-red-dark</p></div>
                        <div class="w-40 h-20 bg-green-light flex justify-center items-center mx-auto"><p>bg-green-light</p></div>
                        <div class="w-40 h-20 bg-green flex justify-center items-center mx-auto"><p>bg-green</p></div>
                        <div class="w-40 h-20 bg-green-dark flex justify-center items-center mx-auto"><p>bg-green-dark</p></div>
                        <div class="w-40 h-20 bg-orange-light flex justify-center items-center mx-auto"><p>bg-orange-light</p></div>
                        <div class="w-40 h-20 bg-orange flex justify-center items-center mx-auto"><p>bg-orange</p></div>
                        <div class="w-40 h-20 bg-orange-dark flex justify-center items-center mx-auto"><p>bg-orange-dark</p></div>
                    </div>
                </div>
                <hr>
                <div class="w-full">
                    <p class="text-2xl mb-4 w-min mx-auto">Buttons</p>
                    <div class="space-x-4">
                        <button class="btn-primary">btn-primary</button>
                        <button class="btn-secondary">btn-secondary</button>
                        <button class="btn-success">btn-success</button>
                        <button class="btn-danger">btn-danger</button>
                        <button class="btn-loading">btn-loading</button>
                        <button class="btn-disabled">btn-disabled</button>
                    </div>
                </div>
                <hr>
                <div class="w-full">
                    <p class="text-2xl mb-4 w-min mx-auto">Cards</p>
                    <div class="card">
                        <p>Title</p>
                        <hr>
                        <div>
                            <p>My content</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="w-full">
                    <p class="text-2xl mb-4 w-min mx-auto">Alerts</p>
                    <div class="space-y-4">
                        <div class="alert alert-success">
                            <p>alert alert-success</p>
                        </div>
                        <div class="alert alert-warning">
                            <p>alert alert-warning</p>
                        </div>
                        <div class="alert alert-danger">
                            <p>alert alert-danger</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="w-full">
                    <p class="text-2xl mb-4 w-min mx-auto">Texts</p>
                    <div class="space-y-4">
                        <div class="text-success">
                            <p>text-success</p>
                        </div>
                        <div class="text-warning">
                            <p>text-warning</p>
                        </div>
                        <div class="text-danger">
                            <p>text-danger</p>
                        </div>
                        <div class="link">
                            <a href="#">link</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="w-full form">
                    <p class="text-2xl mb-4 w-min mx-auto">Inputs</p>
                    <div class="form-group">
                        <label for="disabledInput">Disabled input</label>
                        <input class="form-text-input form-disabled-input" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                    </div>
                    <div class="form-group">
                        <label for="readOnlyInput">Readonly input</label>
                        <input class="form-text-input" id="readOnlyInput" type="text" placeholder="Readonly input here..." readonly="">
                    </div>
                    <div class="form-group">
                        <label for="inputValid">Valid input</label>
                        <input class="form-text-input form-valid-input" type="text" value="correct value" id="inputValid">
                        <div class="form-valid-feedback">Success! You've done it.</div>
                    </div>
                    <div class="form-group">
                        <label for="inputInvalid">Invalid input</label>
                        <input class="form-text-input form-invalid-input" type="text" value="wrong value" id="inputInvalid">
                        <div class="form-invalid-feedback">Sorry, that username's taken. Try another?</div>
                    </div>
                    <div class="form-group">
                        <label for="inputDefault">Default input</label>
                        <input class="form-text-input" type="text" placeholder="Default input" id="inputDefault">
                    </div>
                    <div class="form-group">
                        <label>Group input</label>
                        <div class="form-group">
                            <div class="form-group-input">
                                <input class="form-text-input" type="text" placeholder="Group input">
                                <button class="btn-primary" type="button">Button</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="infoTextInput">Info input</label>
                        <input class="form-text-input" type="text" id="infoTextInput" placeholder="Enter email">
                        <div class="form-info">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-text-input" type="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Select</label>
                        <select class="form-text-input" id="exampleSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Textarea</label>
                        <textarea class="form-text-input" id="exampleTextarea" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formFile">File</label>
                        <input class="form-file-input" type="file" id="formFile">
                    </div>
                    <div class="form-group">
                        <legend>Radio buttons</legend>
                        <div class="form-radio-container">
                            <input class="form-radio-input" type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                            <label for="optionsRadios1">
                                Option one is this and that—be sure to include why it's great
                            </label>
                        </div>
                        <div class="form-radio-container">
                            <input class="form-radio-input" type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            <label for="optionsRadios2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-radio-container">
                            <input class="form-radio-input" type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
                            <label for="optionsRadios3">
                                Option three is disabled
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <legend>Checkboxes</legend>
                        <div class="form-checkbox-container">
                            <input class="form-checkbox-input" type="checkbox" value="" id="flexCheckDefault">
                            <label for="flexCheckDefault">
                                Default checkbox
                            </label>
                        </div>
                        <div class="form-checkbox-container">
                            <input class="form-checkbox-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                            <label for="flexCheckChecked">
                                Checked checkbox
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <legend>Switches</legend>
                        <label for="default-toggle" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" value="" id="default-toggle" class="sr-only peer">
                            <div class="
                                w-11 h-6 bg-white peer-checked:bg-cyan hover:peer-checked:bg-cyan-dark border border-gray hover:border-gray-dark peer-checked:border-0 rounded-full
                                after:absolute after:top-[2px] after:left-[3px] peer-checked:after:left-[1px] after:h-5 after:w-5
                                after:bg-cyan hover:after:bg-cyan-dark peer-checked:after:bg-white peer-checked:hover:after:bg-gray-very-lightest after:rounded-full
                                peer-checked:after:translate-x-full after:transition-all
                            "></div>
                            <span class="ml-3 text-sm font-medium">Default switch checkbox input</span>
                        </label>
                        <label for="checked-toggle" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" value="" id="checked-toggle" class="sr-only peer" checked="">
                            <div class="
                                w-11 h-6 bg-white peer-checked:bg-cyan hover:peer-checked:bg-cyan-dark border border-gray hover:border-gray-dark peer-checked:border-0 rounded-full
                                after:absolute after:top-[2px] after:left-[3px] peer-checked:after:left-[1px] after:h-5 after:w-5
                                after:bg-cyan hover:after:bg-cyan-dark peer-checked:after:bg-white peer-checked:hover:after:bg-gray-very-lightest after:rounded-full
                                peer-checked:after:translate-x-full after:transition-all
                            "></div>
                            <span class="ml-3 text-sm font-medium">Checked switch checkbox input</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <legend>Ranges</legend>
                        <label for="customRange1" class="form-label">Example range</label>
                        <input type="range" class="form-range-input" id="customRange1">
                        <label for="disabledRange" class="form-label">Disabled range</label>
                        <input type="range" class="form-range-input" id="disabledRange" disabled="">
                        <label for="customRange3" class="form-label">Example range</label>
                        <input type="range" class="form-range-input" min="0" max="5" step="0.5" id="customRange3">
                    </div>
                </div>
                <hr>
                <div class="w-full">
                    <p class="text-2xl mb-4 w-min mx-auto">Tables</p>
                    <table class="table">
                        <thead>
                            <tr class="table-head">
                                <th>table-head</th>
                                <th>Column heading</th>
                                <th>Column heading</th>
                                <th>Column heading</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-primary">
                                <td>table-primary</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>
                            <tr class="table-secondary">
                                <td>table-secondary</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>
                            <tr class="table-primary">
                                <td>table-primary</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>
                            <tr class="table-secondary">
                                <td>table-secondary</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>
                            <tr class="table-primary">
                                <td>table-primary</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>
                            <tr class="table-secondary">
                                <td>table-secondary</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                const body = document.getElementsByTagName('body')[0]
                function toggleDarkMode() {
                    body.classList.toggle('dark')
                }
            </script>
        </div>
    </body>
</html>