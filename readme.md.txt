# Project 4
+ By: *Greg Retter*
+ Production URL: <http://p4.dwa15gjr.com>

## Feature summary
*Outline a summary of features that your application has. The following details are from a hypothetical project called "Movie Tracker". Note that it is similar to Foobooks, yet it has its own unique features. Delete this example and replace with your own feature summary*

+ Users can add/update/delete wines in their collection (name, type, grape, year, vineyard, rating, cost, comment)
+ I had images and planned to set them up with a split window display, but spent too much time troubleshooting and didn't get there
+ User's can view thrit wine list, edit, update and delete wines.  The plan was to make multiple lists available based on price, rating, type and tags searches.
+ The user could add wines that were purchased to a table that would allow tracking of how often spcific wines are bought, and where to get the lowest price. 
+ The comments and a seperate table for the vineyard would allow for storage of prefered wines background information, such as where it was made, the vinter who made it and any awards it has.
+ With the user logging in (which was my plan), the site could host wine clubs and share the information mentioned above.
+ The home page features are simple and provides the ability ti view your wines, amd from the full list you can edit or delete wines.  The Home menu allows for adding wines, searching as well as about and contact info.

  
## Database summary
*Describe the tables and relationships used in your database. Delete the examples below and replace with your own info.*

+ My application has 8 tables in total (`users`, `passwords`, `wines`, 'vineyards', 'purchases', 'tags', 'connect_vineyards_and_wines', and 'tag_wine')
+ The tables users and paswords weren't used.
+ There's a many-to-many relationship between `tags` and `wines`
+ There's a one-to-many relationship between `vineyards` and `wines`

## Outside resources
*Shutterbug Images, Food and Wine images and informaton on wines, Stack Overflow and W3 School for troubleshooting, Foobooks for guidance and structure*

## Code style divergences
*List any divergences from PSR-1/PSR-2 and course guidelines on code style - None that I know of*

## Notes for instructor
*Unfortunately this project didn't become what I'd hoped it would be, despite spending quite a bit of time on it.  I had it working with the basics I described above, but 
*i seem to have broke it with the many to many tag to wine relationship.  For some reason the seede for the talbe worked sporadically and would fill half or more of the
tag_wine table, but would always error out.  i fought this problem for two days, along with the show page, edit page and add page that were working and I somehow broke when
setting up the table relationships.  I must admit I'm frustrated with these minor problems wasting my time and ruining my grade, but I have a bad habit of not letting go when
I should, but oddly enough, that is why I like programming.  I apologize for messing this project up, I really thought I could do better. Thanks so much for your patience
and your attention, I did learn alot, and I really enjoyed your teaching style. 
